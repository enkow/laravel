<?php

namespace App\Models\Support;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

trait MapRequest
{

	private $mapExcept = ['id','_token','repeat_password'];

	/**
	 * Map request values into model attributes
	 * @param  array               $map     Directive how to connect values
	 * @param  SymfonyRequest|null $request Request object
	 * @return Self
	 */
	public function mapRequest( $map, SymfonyRequest $request = null )
	{
		$request = $request === null ? app('request') : $request;

		if( $map === '*' ){
			$map = array_keys( $request->toArray() );
		}

		// model => request
		foreach( $map as $key => $value ) {
			$key = is_int( $key ) ? $value : $key;

			if( $this->hasMapModifiers( $key ) ) {
				$value = $this->callMapModifier( $key, $request->get( $key, '' ), $request );
			} else {
				$value = $request->get( $value, '' );
			}

			if( !in_array( $key, $this->mapExcept ) ) {
				$this->setAttribute( $key, $value );
			}
		}

		if (isset($request->title) && isset($request->description) && isset($request->name) && !$request->title) {
			$this->setAttribute('title', $request->name);
		}
		return $this;
	}

	private function getMapModifierName( $name )
	{
		return sprintf("map%sAttribute", studly_case( $name ) );
	}

	private function hasMapModifiers( $name )
	{
		$method = $this->getMapModifierName( $name );
		return method_exists( $this, $method );
	}

	private function callMapModifier( $name, $value, $request )
	{
		$method = $this->getMapModifierName( $name );
		return $this->{$method}( $value, $request );
	}
}
