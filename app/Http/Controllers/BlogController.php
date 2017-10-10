<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;

class BlogController extends BaseController
{
  protected $prefix = 'admin.blog';

  public function index()
  {
    $posts = Blog::all();

    return $this->view('index', compact('posts'));
  }

  public function create()
  {
    $tags = Tag::all()->pluck('name', 'id');

    return $this->view('create', compact('tags'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'name' => 'required',
        'photo' => 'required',
        'content' => 'required',
        'tag_list'  => 'required',
    ]);

    $post = new Blog;
    $post->mapRequest('*');
    unset($post->tag_list);

    $counter = Blog::where('slug', '=', str_slug($post->name))->count();
    if ($counter) {
      $post->slug = sprintf('%s-%s', str_slug($post->name), $counter);
    } else {
      $post->slug = str_slug($post->name);
    }

    if( $post->save() ) {
      foreach ($request->tag_list as $tag) {
        $tag = Tag::find($tag);
        $post->tags()->attach($tag);
      }
      return redirect()->route('admin.blog.index' )->withSuccess('Post został dodany!');
    }
    return redirect()->back()->withInput()->withErrors('Post nie został zapisany! Spróbuj ponownie.');
  }

  public function edit(Blog $blog)
  {
    $tags = Tag::all()->pluck('name', 'id');

    return $this->view('edit', compact('blog', 'tags'));
  }

  public function update(Request $request, Blog $blog)
  {
    $this->validate($request, [
        'name' => 'required',
        'photo' => 'required',
        'content' => 'required',
        'tag_list'  => 'required',
    ]);

    $blog->mapRequest( '*' );
    unset($blog->tag_list);
    $counter = Blog::where('id', '!=', $blog->id)->where('slug', '=', str_slug($blog->name))->count();
    if ($counter) {
      $blog->slug = sprintf('%s-%s', str_slug($blog->name), $counter);
    } else {
      $blog->slug = str_slug($blog->name);
    }

    $blog->tags()->detach();
    foreach ($request->tag_list as $tag) {
      $tag = Tag::find($tag);
      $blog->tags()->attach($tag);
    }

    if ($blog->save()) {
      return redirect()->route('admin.blog.index')->withSuccess( 'Post został zapisany!' );
    }
    return redirect()->back()->withInput()->withErrors('Post nie został zapisany! Spróbuj ponownie.');
  }

  public function delete(Blog $blog)
	{
    $path = $path = public_path('img') . DIRECTORY_SEPARATOR . 'blog';
    if (file_exists($path . DIRECTORY_SEPARATOR . $blog->photo)) {
      unlink($path . DIRECTORY_SEPARATOR . $blog->photo);
    }

    $blog->tags()->detach();

    $blog->delete();
		return redirect()->back()->withSuccess( 'Post został usunięty!' );
	}
}
