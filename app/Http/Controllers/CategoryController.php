<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
  protected $prefix = 'admin.category';

  public function index()
  {
    $categories = Category::all();

    return $this->view('index', compact('categories'));
  }

  public function show(Category $category)
  {
    return $this->view('show', compact('category'));
  }

  public function create()
	{
		return $this->view('create');
	}

	public function store(Request $request)
	{
    $this->validate($request, [
        'name' => 'required',
        'order' => 'required|numeric'
    ]);

		$category = new Category;
		$category->mapRequest('*');

    $counter = Category::where('slug', '=', str_slug($category->name))->count();
    if ($counter) {
      $category->slug = sprintf('%s-%s', str_slug($category->name), $counter);
    } else {
      $category->slug = str_slug($category->name);
    }

		if($category->save()) {
			return redirect()->route('admin.category.index')->withSuccess('Kategoria została dodana!');
		}
		return redirect()->back()->withInput()->withErrors('Kategoria nie została zapisana! Spróbuj ponownie');
	}

  public function edit(Category $category)
	{
		return $this->view('edit', compact('category'));
	}

	public function update(Request $request, Category $category)
	{
    $this->validate($request, [
        'name' => 'required',
        'order' => 'required|numeric'
    ]);

    $category->mapRequest('*');

    $counter = Category::where('id', '!=', $category->id)->where('slug', '=', str_slug($category->name))->count();
    if ($counter) {
      $category->slug = sprintf('%s-%s', str_slug($category->name), $counter);
    } else {
      $category->slug = str_slug($category->name);
    }

    if ($category->save()) {
      return redirect()->route('admin.category.index')->withSuccess('Kategoria została zapisana!');
    }
    return redirect()->back()->withInput()->withErrors('Kategoria nie została zapisana! Spróbuj ponownie');

	}

  public function delete(Category $category)
	{
    $photos = $category->photos;
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

    if ($category->delete()) {
      return redirect()->back()->withSuccess('Kategoria została usunięta!');
    }
		return redirect()->back()->withInput()->withErrors('Kategoria nie została usunięta! Spróbuj ponownie.');
	}
}
