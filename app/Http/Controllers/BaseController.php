<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseController extends Controller
{
	use ValidatesRequests;
	protected $prefix = null;

	protected $share = [];

	public function __construct()
	{
		$this->shareVariables();
		//view()->share('sub', $this->getSubdomain());
	}

	// protected function getSubdomain()
	// {
	// 	$domain = env('APP_DOMAIN', 'myvod.io');
	// 	$sub = str_replace($domain, '', $request->server('HTTP_HOST'));
	// 	$sub = str_replace('.', '', $sub);
	// 	return $sub;
	// }

	protected function view( $view, $data = [] )
	{
		if( isset( $this->prefix ) and $this->prefix !== null ) {
			$view = sprintf("%s.%s", $this->prefix, $view );
		}

		return view( $view, $data );
	}

	protected function shareVariables()
	{
		foreach( $this->share as $name => $variable ){
			view()->share( $name, $variable );
		}
	}
}
