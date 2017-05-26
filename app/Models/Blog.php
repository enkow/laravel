<?php

namespace App\Models;

use Hash;

class Blog extends AbstractUser
{
	use Support\MapRequest;

	protected $table = 'blog';

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
	}
}
