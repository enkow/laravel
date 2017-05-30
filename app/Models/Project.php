<?php

namespace App\Models;

class Project extends Model
{
	use Support\MapRequest;

	protected $table = 'projects';

	public function photos()
	{
		return $this->hasMany(Photo::class, 'project_id', 'id');
	}
}
