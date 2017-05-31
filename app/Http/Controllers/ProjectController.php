<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Project;

class ProjectController extends BaseController
{
  protected $prefix = 'admin.project';

  public function index()
  {
    $projects = Project::all();

    return $this->view('index', compact('projects'));
  }

  public function show(Project $project)
  {
    return $this->view('show', compact('project'));
  }

  public function create()
	{
		return $this->view('create');
	}

	public function store(Request $request)
	{
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'type' => 'required'
    ]);

		$project = new Project;
		$project->mapRequest('*');

    $counter = Project::where('slug', '=', str_slug($project->name))->count();
    if ($counter) {
      $project->slug = sprintf('%s-%s', str_slug($project->name), $counter);
    } else {
      $project->slug = str_slug($project->name);
    }

		if($project->save()) {
			return redirect()->route('admin.project.edit', $project->id)->withSuccess('Projekt został dodany!');
		}
		return redirect()->back()->withInput()->withErrors('Projekt nie został zapisany! Spróbuj ponownie');
	}

  public function edit(Request $request, Project $project)
	{
    $photos = [];
    $data = $project->photos;
    foreach ($data as $photo) {
      $photos[] = [
        'id' => $photo->id,
        'name' => $photo->name,
        'url' => $request->getUriForPath('/img/portfolio/' . $photo->name),
      ];
    }
    $photos = json_encode($photos);

		return $this->view('edit', compact('project', 'photos'));
	}

	public function update(Request $request, Project $project)
	{
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'type' => 'required'
    ]);

    $project->mapRequest('*');

    $counter = Project::where('id', '!=', $project->id)->where('slug', '=', str_slug($project->name))->count();
    if ($counter) {
      $project->slug = sprintf('%s-%s', str_slug($project->name), $counter);
    } else {
      $project->slug = str_slug($project->name);
    }

    if ($project->save()) {
      return redirect()->route('admin.project.index')->withSuccess('Projekt został zapisany!');
    }
    return redirect()->back()->withInput()->withErrors('Projekt nie został zapisany! Spróbuj ponownie');

	}

  public function delete(Project $project)
	{
    $photos = $project->photos;
    $path = $path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';

    foreach ($photos as $photo) {
      if (file_exists($path . DIRECTORY_SEPARATOR . $photo->name)) {
        unlink($path . DIRECTORY_SEPARATOR . $photo->name);
      }
      $photo->delete();
    }

    if ($project->delete()) {
      return redirect()->back()->withSuccess('Projekt został usunięty!');
    }
		return redirect()->back()->withInput()->withErrors('Projekt nie został usunięty! Spróbuj ponownie.');
	}
}
