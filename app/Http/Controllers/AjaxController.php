<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Category;
use Image;

class AjaxController extends BaseController
{
	public function upload(Request $request, $dir)
	{
		$upload = $request->file('file');

    if (!$upload) {
      return response()->json( [], 400 );
    }

    $path = public_path('img') . DIRECTORY_SEPARATOR . $dir;
    //dd($path);
    $name = pathinfo( $upload->getClientOriginalName(), PATHINFO_FILENAME );
    $ext = pathinfo( $upload->getClientOriginalName(), PATHINFO_EXTENSION );

    $fullname = $name . '.' . $ext;
		$counter = 1;

		while(file_exists($path . DIRECTORY_SEPARATOR . $fullname)) {
			$fullname = $name . '-' . ( string ) $counter++ . '.' . $ext;
		}

    //dd($upload->getClientOriginalName());

		if($upload->move($path, $fullname)) {
			if ($dir == 'blog') {
				$img = Image::make($path . DIRECTORY_SEPARATOR . $fullname)
						->fit(750, 300)
						->save($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $fullname);
			}

			return response()->json( [ 'name' => $fullname ], 200 );
		}

		return response()->json( [], 400 );
	}


	public function uploadGallery(Request $request, Project $project)
	{
			$file = $request->file('image');
			$category = Category::find($request->category);
			if (!$file || !$category) {
				return $this->response( [], 400 );
			}

			$photo = new Photo();

			$path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';
			$picture = $photo->setPhotoName($file, $path);
			$file->move($path, $picture);

			$img = Image::make($path . DIRECTORY_SEPARATOR . $picture)
					->fit(650, 433)
					->save($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $picture);

			$photo->name = $picture;
			$photo->project_id = $project->id;
			$photo->category_id = $category->id;
			$photo->save();

			$url = $request->getUriForPath('/img/portfolio/'.$picture);
			$response = array(
					'status' => 'success',
					'id' => $photo->id,
					'name' => $picture,
					'url' => $url
			);

			return response()->json($response, 200);
	}

	/**
	 * Remove photo from gallery.
	 *
	 * @Route("/admin/ajax/gallery/remove/{id}", name="admin-ajax-gallery-remove")
	 * @Route("/admin/ajax/gallery/remove/{id}/")
	 * @ParamConverter("photo", class="AppBundle:Photo")
	 *
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return Response A Response instance
	 */
	public function removeGallery(Request $request, Photo $photo)
	{
			if (!$photo) {
				return $this->response([], 400);
			}

			$path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';
			if (file_exists($path . DIRECTORY_SEPARATOR . $photo->name)) {
					unlink($path . DIRECTORY_SEPARATOR . $photo->name);
			}
			if (file_exists($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $photo->name)) {
					unlink($path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $photo->name);
			}

			$photo->delete();

			$response = array('status' => 'success');

			return response()->json($response, 200);
	}

	public function setMainPhoto(Request $request, Photo $photo)
	{
			if (!$photo) {
				return $this->response([], 400);
			}

			$project = $photo->project;
			$main = $project->photos()->where('main', '=', 1)->first();
			if ($main) {
				$main->main = 0;
				$main->save();
			}

			$photo->main = 1;
			$photo->save();
			$response = array('status' => 'success');

			return response()->json($response, 200);
	}
}
