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
}
