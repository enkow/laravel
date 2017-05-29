<?php

namespace App\Models;

class Blog extends AbstractUser
{
	use Support\MapRequest;

	protected $table = 'blog';

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
	}

	public function getTagListAttribute()
	{
	     if (!$this->tags->isEmpty()) {
				 return $this->tags->pluck('id', 'name')->toArray();
			 }

			 return array();
	}
}
