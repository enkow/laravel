<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends BaseController
{
	public function upload(Request $request, $dir)
	{
		$upload = $request->file('file');

    if (!$upload) {
      return response()->json( [], 400 );
    }

    $path = public_path('img') . DIRECTORY_SEPARATOR . $dir;
    //dd($path);
    $name = pathinfo( $upload->getClientOriginalName(), PATHINFO_FILENAME );
    $ext = pathinfo( $upload->getClientOriginalName(), PATHINFO_EXTENSION );

    $fullname = $name . '.' . $ext;
		$counter = 1;

		while( file_exists( $path . DIRECTORY_SEPARATOR . $fullname ) ) {
			$fullname = $name . '-' . ( string ) $counter++ . '.' . $ext;
		}

    //dd($upload->getClientOriginalName());

		if( $upload->move( $path, $fullname ) ) {
			return response()->json( [ 'name' => $fullname ], 200 );
		}

		return response()->json( [], 400 );
	}
}
