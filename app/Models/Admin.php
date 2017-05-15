<?php

namespace App\Models;

use Hash;

class Admin extends AbstractUser
{
	use Support\MapRequest;

	protected $table = 'admin';
}
