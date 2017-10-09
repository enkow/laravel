<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;

class WebController extends BaseController
{
  protected $prefix = 'web';

  public function index()
  {
    return $this->view('index');
  }

  public function blog()
  {
    return $this->view('blog');
  }

  public function blogView()
  {
    return $this->view('blog-view');
  }

  public function offerView()
  {
    return $this->view('offer-view');
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
