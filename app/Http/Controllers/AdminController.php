<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Auth;

class AdminController extends BaseController
{
  protected $prefix = 'admin';
  protected $guard;

	public function __construct()
	{
		$this->guard = Auth::guard( 'admin' );
	}

  public function dashboard(Request $request)
  {
    return $this->view('dashboard');
  }
}
