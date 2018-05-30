<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Blog;
use App\Models\Offer;
use App\Models\Photo;
use App\Models\Support\Paginator;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;

class WebController extends BaseController
{
  protected $prefix = 'web';

  public function index()
  {
    $offers = Offer::all();
    $posts = Blog::orderBy('created_at', 'desc')->take(3)->get();
    $projects = Project::where('main', '=', 1)->orderBy('order', 'asc')->take(6)->get();

    return $this->view('index', compact('offers', 'posts', 'projects'));
  }

  public function blog($page = 1) //done
  {
    $first = Blog::orderBy('created_at', 'desc')->first();
    $except = $first ? $first->id : 0;
    $query = Blog::where('id', '!=', $except);
    $orderBy = ['created_at', 'desc'];
    list($posts, $paginator) = Paginator::pagination($page, $query, $orderBy, 10);

    return $this->view('blog', compact('first', 'posts', 'paginator'));
  }

  public function blogView($slug) //done
  {
    $post = Blog::where('slug', '=', $slug)->firstOrFail();
    $posts = Blog::where('id', '!=', $post->id)->take(2)->inRandomOrder()->get();

    return $this->view('blog-view', compact('post', 'posts'));
  }

  public function offerView($slug) //done
  {
    $offer = Offer::where('slug', '=', $slug)->firstOrFail();
    $pdf = sprintf('%s/%s.pdf', public_path('pdf'), str_slug($offer->name));
    if (!file_exists($pdf)) {
      $pdf = null;
    }

    return $this->view('offer-view', compact('offer', 'pdf'));
  }

  public function tag($slug, $page = 1) //done
  {
    $tag = Tag::where('slug', '=', $slug)->firstOrFail();
    $tags = Tag::orderBy('name', 'asc')->get();
    $query = $tag->posts();
    $orderBy = ['created_at', 'desc'];
    list($posts, $paginator) = Paginator::pagination($page, $query, $orderBy, 3);

    return $this->view('tag', compact('tag', 'tags', 'posts', 'paginator'));
  }

  public function photos($page = 1) //done
  {
    $categories = Category::orderBy('order', 'asc')->get();
    $query = Project::where('id', '>', 0);
    $orderBy = ['order', 'asc'];
    list($projects, $paginator) = Paginator::pagination($page, $query, $orderBy, 16);

    return $this->view('photos', compact('categories', 'projects', 'paginator'));
  }

  public function portfolio($slug, $page = 1) //done
  {
    $category = Category::where('slug', '=', $slug)->firstOrFail();
    $categories = Category::orderBy('order', 'asc')->get();
    $query = $category->photos();
    $orderBy = ['id', 'desc'];
    list($photos, $paginator) = Paginator::pagination($page, $query, $orderBy, 15);

    return $this->view('portfolio', compact('category', 'categories', 'photos', 'paginator'));
  }

  public function portfolioView($slug)
  {
    $project = Project::where('slug', '=', $slug)->firstOrFail();

    return $this->view('portfolio-view', compact('project'));
  }

  public function contact(Request $request)
  {
    if (!$request->name || !$request->email || !$request->message) {
      return redirect()->route('home', '#contact')->withErrors('Wypełnij formularz poprawnie!');
    }

    try {
      $sent = app('mailer')->send('mail.contact', ['name' => $request->name, 'msg' => $request->message, 'email' => $request->email], function ($mailer) {
        $mailer->to('biuro@studioarchemia.pl')->subject('Formularz kontaktowy');
      });
    } catch (\Exception $e) {
      return redirect()->route('home', '#contact')->withErrors('Coś poszło nie tak, spróbuj pownownie za kilka minut');
    }

    return redirect()->route('home', '#contact')->withSuccess('Wiadomośc została wysłana');
  }
}
