<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
	// public function meta( $name, $default = null )
	// {
	// 	$names = [ 'title', 'description', 'keywords' ];
	// 	$attribute = sprintf( "meta_%s", $name );
  //
	// 	if( in_array( $name, $names ) && isset( $this->attributes[ $attribute ] ) ) {
	// 		return $this->getAttribute( $attribute );
	// 	}
	// 	return $default;
	// }
}
