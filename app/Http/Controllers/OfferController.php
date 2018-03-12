<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\BaseController;
use App\Models\Offer;

class OfferController extends BaseController
{
  protected $prefix = 'admin.offer';

  public function index()
  {
    $offers = Offer::all();

    return $this->view('index', compact('offers'));
  }

  public function show(Offer $offer)
  {
    return $this->view('show', compact('offer'));
  }

  public function create()
	{
    $icons = [];
    $path = public_path('img') . DIRECTORY_SEPARATOR . 'ikony';
    $data = scandir($path);
    foreach ($data as $icon) {
      if ($icon != '.' && $icon != '..' && $icon != 'duze') {
        $icons[$icon] = $icon;
      }
    }

		return $this->view('create', compact('icons'));
	}

	public function store(Request $request)
	{
    $this->validate($request, [
      'name' => 'required',
      'lead' => 'required',
      'description' => 'required',
      'photo' => 'required',
      'icon' => 'required',
    ]);

		$offer = new Offer;
		$offer->mapRequest('*');

    $counter = Offer::where('slug', '=', str_slug($offer->name))->count();
    if ($counter) {
      $offer->slug = sprintf('%s-%s', str_slug($offer->name), $counter);
    } else {
      $offer->slug = str_slug($offer->name);
    }

		if($offer->save()) {
			return redirect()->route('admin.offer.index')->withSuccess('Oferta została dodana!');
		}
		return redirect()->back()->withInput()->withErrors('Oferta nie została zapisana! Spróbuj ponownie');
	}

  public function edit(Request $request, Offer $offer)
	{
    $icons = [];
    $path = public_path('img') . DIRECTORY_SEPARATOR . 'ikony';
    $data = scandir($path);
    foreach ($data as $icon) {
      if ($icon != '.' && $icon != '..') {
        $icons[$icon] = $icon;
      }
    }

		return $this->view('edit', compact('offer', 'icons'));
	}

	public function update(Request $request, Offer $offer)
	{
    $this->validate($request, [
      'name' => 'required',
      'lead' => 'required',
      'description' => 'required',
      'photo' => 'required',
      'icon' => 'required',
    ]);

    $offer->mapRequest('*');

    $counter = Offer::where('id', '!=', $offer->id)->where('slug', '=', str_slug($offer->name))->count();
    if ($counter) {
      $offer->slug = sprintf('%s-%s', str_slug($offer->name), $counter);
    } else {
      $offer->slug = str_slug($offer->name);
    }

    if ($offer->save()) {
      return redirect()->route('admin.offer.index')->withSuccess('Oferta została zapisana!');
    }
    return redirect()->back()->withInput()->withErrors('Oferta nie została zapisana! Spróbuj ponownie');

	}

  public function delete(Offer $offer)
	{
    $path = public_path('img') . DIRECTORY_SEPARATOR . 'oferta';
    if (file_exists($path . DIRECTORY_SEPARATOR . $offer->photo)) {
      unlink($path . DIRECTORY_SEPARATOR . $offer->photo);
    }

    if ($offer->delete()) {
      return redirect()->back()->withSuccess('Oferta została usunięta!');
    }
		return redirect()->back()->withInput()->withErrors('Oferta nie została usunięta! Spróbuj ponownie.');
	}
}
