<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;

class BlogController extends BaseController
{
  protected $prefix = 'superadmin.blog';

  public function index()
  {
    $posts = Blog::all();

    return $this->view('index', compact('posts'));
  }

  public function create()
  {
    return $this->view( 'create' );
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'name' => 'required',
        'content' => 'required',
        'foto' => 'required',
    ]);

    $post = new Blog;
    $post->mapRequest( '*' );
    $post->slug = str_slug($post->name);

    if( $post->save() ) {
      return redirect()->route('superadmin.blog.index' )->withSuccess('Post został dodany!');
    }
    return redirect()->back()->withInput()->withErrors('Post nie został zapisany! Spróbuj ponownie.');
  }

  public function edit(Blog $blog)
  {
    return $this->view('edit', compact('blog'));
  }

  public function update(Request $request, Blog $blog)
  {
    $this->validate($request, [
        'name' => 'required',
        'content' => 'required',
        'foto' => 'required',
    ]);

    $blog->mapRequest( '*' );
    $blog->slug = str_slug($blog->name);
    $blog->save();

    return redirect()->route('superadmin.blog.index')->withSuccess( 'Post został zapisany!' );
  }

  public function delete(Blog $blog)
	{
    $path = $path = public_path('assets/img') . DIRECTORY_SEPARATOR . 'blog';
    if (file_exists($path . DIRECTORY_SEPARATOR . $blog->foto)) {
      unlink($path . DIRECTORY_SEPARATOR . $blog->foto);
    }

    $blog->delete();
		return redirect()->back()->withSuccess( 'Post został usunięty!' );
	}
}
