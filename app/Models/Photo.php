<?php

namespace App\Models;

class Photo extends AbstractUser
{
	use Support\MapRequest;

	protected $table = 'photos';

	public function project()
  {
    return $this->belongsTo(Project::class, 'project_id', 'id');
  }
}
