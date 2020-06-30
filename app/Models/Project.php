<?php

namespace App\Models;

class Project extends Model
{
	use Support\MapRequest;

	const PROJECT = 0;
	const REALIZATION = 1;
	protected $table = 'projects';

	public function photos()
	{
		return $this->hasMany(Photo::class, 'project_id', 'id');
	}
}
