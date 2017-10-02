<?php

namespace App\Models;

class Photo extends Model
{
	use Support\MapRequest;

	protected $table = 'photos';

	public function project()
  {
    return $this->belongsTo(Project::class, 'project_id', 'id');
  }

	public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

	public function setPhotoName($file, $path)
	{
		$name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
		$fullname = $name . '.' . $extension;
		$counter = 1;

		while( file_exists( $path . DIRECTORY_SEPARATOR . $fullname ) ) {
			$fullname = $name . '-' . (string)$counter++ . '.' . $extension;
		}

		return $fullname;
	}
}
