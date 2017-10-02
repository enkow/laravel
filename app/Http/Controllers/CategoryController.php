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
        'name' => 'required'
    ]);

		$category = new Category;
		$category->mapRequest('*');

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
        'name' => 'required'
    ]);

    $category->mapRequest('*');
    if ($category->save()) {
      return redirect()->route('admin.category.index')->withSuccess('Kategoria została zapisana!');
    }
    return redirect()->back()->withInput()->withErrors('Kategoria nie została zapisana! Spróbuj ponownie');

	}

  public function delete(Category $category)
	{
    $category->posts()->detach();
    if ($category->delete()) {
      return redirect()->back()->withSuccess('Kategoria została usunięta!');
    }
		return redirect()->back()->withInput()->withErrors('Kategoria nie została usunięta! Spróbuj ponownie.');
	}
}
