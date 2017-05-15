<?php

namespace App\Models;

use Hash;
use Illuminate\Contracts\Auth\Authenticatable;

abstract class AbstractUser extends Model implements Authenticatable
{
    protected $view = 'mail.reset';

	public function generateResetToken( $length = 32 )
	{
		$token = str_random( $length );
		$this->setAttribute( 'reset_token', $token );

		if( $save = $this->save() ) {
			return $token;
		}

		return $save;
	}

	public static function findByToken( $token )
	{
        // prevent finding zero-length roken in database
        if( strlen( $token ) < 16 ) return null;

		return ( new static )->where( 'reset_token', '=', $token )->first();
	}

    public function setPassword( $password )
    {
        $this->setAttribute( 'password', $password );
        $this->setAttribute('reset_token', '_');
        return $this;
    }

	public function resetPassword()
	{
		$token = $this->generateResetToken();
		$mail = $this->mail;

		$sent = app('mailer')->send( $this->view, [ 'token' => $token ], function ( $mailer ) use ( $mail ) {
            $mailer->to( $mail )->subject( '[ BUDMAT ] Reset hasła' );
        });

        return $sent;
	}

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
    	return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
    	return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
    	return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
    	return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
    	return $this->setAttribute('remember_token', $value )->save();
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
    	return 'remember_token';
    }

    public function setPasswordAttribute( $password )
    {
        return $this->attributes[ 'password' ] = Hash::make( $password );
    }
}
