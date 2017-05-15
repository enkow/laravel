<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{

	protected $prefix = 'admin.auth';

	protected $guard;

	public function __construct()
	{
		$this->guard = Auth::guard( 'admin' );
	}

	public function login()
	{
		return $this->view( 'login' );
	}

	public function authorize( Request $request )
	{
		$this->validate( $request, [ 'email'	=> 'required|email', 'password' => 'required' ] );

		$credentials = $request->only( ['email', 'password' ] );
		$remember = $request->get( 'remember', false ) == 1 ? true : false ;

		if( $this->guard->attempt( $credentials, $remember ) ) {
			return redirect()->route( 'admin.dashboard' )->withSuccess( 'Zalogowano pomyślnie!' );
		}
		return redirect()->back()->withErrors( 'Podałeś/aś niepoprawne dane!');
	}

	public function logout()
	{
		$this->guard->logout();
		return redirect()->route('admin.login')->withSuccess('Wylogowano pomyślnie!');
	}

	public function forget()
	{
		return $this->view('forget');
	}

	public function reset( Request $request )
	{
		$this->validate( $request, [ 'email' => 'required|email' ] );

		$user = Admin::where( 'email', '=', $request->get('email') )->first();

		if( $user != null ) {
			$user->resetPassword();
		}

		return redirect()->route( 'admin.login' )->withSuccess( 'Jeżeli podałeś prawidłowy adres to została wysłana na niego wiadomość z instrukcją!' );

	}

	public function token( $token )
	{
		$user = Admin::findByToken( $token );

		if( $user === null ) {
			return redirect()->route('admin.login')->withErrors('Niepoprawny token!');
		}

		return $this->view( 'reset' );
	}

	public function store( Request $request, $token )
	{
		$this->validate( $request, [ 'password' => 'required|min:8', 'repeat_password' => 'required|same:password' ] );

		$user = Admin::findByToken( $token );

		if( $user === null ) {
			return redirect()->route('admin.login')->withErrors('Niepoprawny token!');
		}

		$user->setPassword( $request->input('password') )->save();

		return redirect()->route( 'admin.login' )->withSuccess('Hasło zostało zmienione');
	}
}
