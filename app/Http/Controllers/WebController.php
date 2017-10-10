<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Blog;
use App\Models\Offer;

class WebController extends BaseController
{
  protected $prefix = 'web';

  public function index()
  {
    $offers = Offer::all();
    $posts = Blog::orderBy('created_at', 'desc')->take(3)->get();

    return $this->view('index', compact('offers', 'posts'));
  }

  public function blog()
  {
    return $this->view('blog');
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

    return $this->view('offer-view', compact('offer'));
  }

  public function tag()
  {
    return $this->view('tag');
  }

  public function portfolio()
  {
    return $this->view('portfolio');
  }

  public function portfolioView()
  {
    return $this->view('portfolio-view');
  }

  public function category()
  {
    return $this->view('category');
  }
}
