<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Models\Project;
use App\Models\Category;

class RealizationController extends BaseController
{
  protected $prefix = 'admin.realization';

  public function index()
  {
    $realizations = Project::where('type', Project::REALIZATION)->get();

    return $this->view('index', compact('realizations'));
  }

  public function show(Project $realization)
  {
    return $this->view('show', compact('realization'));
  }

  public function create()
  {
    if (!Category::orderBy('id', 'asc')->count()) {
      return redirect()->route('admin.category.create')->withErrors('Najpierw dodaj kategorie zdjęć!');
    }

    return $this->view('create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'order' => 'numeric',
      'main' => 'boolean'
    ]);

    $realization = new Project;
    $realization->mapRequest('*');
    $realization->type = Project::REALIZATION;

    $counter = Project::where('slug', '=', str_slug($realization->name))->count();
    if ($counter) {
      $realization->slug = sprintf('%s-%s', str_slug($realization->name), $counter);
    } else {
      $realization->slug = str_slug($realization->name);
    }

    if($realization->save()) {
      return redirect()->route('admin.realization.edit', $realization->id)->withSuccess('Realizacja została dodana!');
    }
    return redirect()->back()->withInput()->withErrors('Realizacja nie została zapisana! Spróbuj ponownie');
  }

  public function edit(Request $request, Project $realization)
  {
    $categories = Category::all();
    foreach ($categories as $category) {
      $photos[$category->id] = [];
      $data = $realization->photos()->where('category_id', '=', $category->id)->get();
      foreach ($data as $photo) {
        $photos[$category->id][] = [
          'id' => $photo->id,
          'name' => $photo->name,
          'url' => $request->getUriForPath('/img/portfolio/' . $photo->name),
          'main' => $photo->main,
        ];
      }
    }

    $photos = json_encode($photos);

    return $this->view('edit', compact('realization', 'photos', 'categories'));
  }

  public function update(Request $request, Project $realization)
  {
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'order' => 'numeric',
      'main' => 'boolean'
    ]);

    $realization->mapRequest('*');
    $realization->type = Project::REALIZATION;

    $counter = Project::where('id', '!=', $realization->id)->where('slug', '=', str_slug($realization->name))->count();
    if ($counter) {
      $realization->slug = sprintf('%s-%s', str_slug($realization->name), $counter);
    } else {
      $realization->slug = str_slug($realization->name);
    }

    if ($realization->save()) {
      return redirect()->route('admin.realization.index')->withSuccess('Realizacja została zapisana!');
    }
    return redirect()->back()->withInput()->withErrors('Realizacja nie została zapisana! Spróbuj ponownie');

  }

  public function delete(Project $realization)
  {
    $photos = $realization->photos;
    $path = $path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';

    foreach ($photos as $photo) {
      if (file_exists($path . DIRECTORY_SEPARATOR . $photo->name)) {
        unlink($path . DIRECTORY_SEPARATOR . $photo->name);
      }
      if (file_exists($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $photo->name)) {
        unlink($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $photo->name);
      }
      $photo->delete();
    }

    if ($realization->delete()) {
      return redirect()->back()->withSuccess('Realizacja została usunięta!');
    }
    return redirect()->back()->withInput()->withErrors('Realizacja nie została usunięty! Spróbuj ponownie.');
  }
}
