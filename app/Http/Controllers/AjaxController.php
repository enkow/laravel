<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Project;

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

		while( file_exists( $path . DIRECTORY_SEPARATOR . $fullname ) ) {
			$fullname = $name . '-' . ( string ) $counter++ . '.' . $ext;
		}

    //dd($upload->getClientOriginalName());

		if( $upload->move( $path, $fullname ) ) {
			return response()->json( [ 'name' => $fullname ], 200 );
		}

		return response()->json( [], 400 );
	}


	public function uploadGallery(Request $request, Project $project)
	{
			$file = $request->file('image');
			if (!$file) {
				return $this->response( [], 400 );
			}
			$path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';
			$picture = $this->setPhotoName($file);
			$file->move($path, $picture);

			$photo = new Photo();
			$photo->name = $picture;
			$photo->project_id = $project->id;
			$photo->save();

			$url = $request->getUriForPath('/gallery/'.$picture);
			$response = array(
					'status' => 'success',
					'id' => $photo->id,
					'name' => $picture,
					'url' => $url
			);

			return $this->response($response, 200);
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
				return $this->response( [], 400 );
			}

			$path = public_path('img') . DIRECTORY_SEPARATOR . 'portfolio';
			if (file_exists($path . DIRECTORY_SEPARATOR . $photo->name)) {
					unlink($path.$photo->getName());
			}

			$photo->delete();

			$response = array('status' => 'success');

			return new JsonResponse($response);
	}
}
