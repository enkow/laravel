<?php

namespace App\Models;

class Tag extends Model
{
	use Support\MapRequest;

	protected $table = 'tags';

  public function posts()
	{
		return $this->belongsToMany(Blog::class, 'blog_tags', 'tag_id', 'blog_id');
	}
}
