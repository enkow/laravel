<?php

namespace App\Http\Controllers;

use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;

class LogController extends BaseController
{
	protected $prefix = 'admin.log';

	public function logs( Request $request )
	{
		if ( $request->input('l')) {
			LaravelLogViewer::setFile( base64_decode( $request->input('l') ));
		}

		if ( $request->input('dl')) {

			$file = base64_decode( $request->input('dl'));
			$path = storage_path( '/logs/' . $file );
			return response()->download( $path );

		} elseif ( $request->has('del')) {

			$file = base64_decode( $request->input('del'));
			$path = storage_path( '/logs/' . $file );

			if( file_exists( $path ) ) {
				unlink( $path );
			}

			return redirect()->route( 'admin.logs' );
		}

		$logs = LaravelLogViewer::all();

		return $this->view('log', [
			'logs' => $logs,
			'files' => LaravelLogViewer::getFiles( true ),
			'current_file' => LaravelLogViewer::getFileName()
		]);
	}
}
