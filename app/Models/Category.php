<?php

namespace App\Models;

class Category extends Model
{
	use Support\MapRequest;

	protected $table = 'photo_categories';

	public function photos()
	{
		return $this->hasMany(Photo::class, 'category_id', 'id');
	}
}
