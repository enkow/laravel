<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Tag;

class TagController extends BaseController
{
  protected $prefix = 'admin.tag';

  public function index()
  {
    $tags = Tag::all();

    return $this->view('index', compact('tags'));
  }

  public function show(Tag $tag)
  {
    return $this->view('show', compact('tag'));
  }

  public function create()
	{
		return $this->view('create');
	}

	public function store(Request $request)
	{
    $this->validate($request, [
        'name' => 'required'
    ]);

		$tag = new Tag;
		$tag->mapRequest('*');

		if($tag->save()) {
			return redirect()->route('admin.tag.index')->withSuccess('Tag został dodany!');
		}
		return redirect()->back()->withInput()->withErrors('Tag nie został zapisany! Spróbuj ponownie');
	}

  public function edit(Tag $tag)
	{
		return $this->view('edit', compact('tag'));
	}

	public function update(Request $request, Tag $tag)
	{
    $this->validate($request, [
        'name' => 'required'
    ]);

    $tag->mapRequest('*');
    if ($tag->save()) {
      return redirect()->route('admin.tag.index')->withSuccess('Tag został zapisany!');
    }
    return redirect()->back()->withInput()->withErrors('Tag nie został zapisany! Spróbuj ponownie');

	}

  public function delete(Tag $tag)
	{
    $tag->posts()->detach();
    if ($tag->delete()) {
      return redirect()->back()->withSuccess('Tag został usunięty!');
    }
		return redirect()->back()->withInput()->withErrors('Tag nie został usunięty! Spróbuj ponownie.');
	}
}
