<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\BayarPajak;

class BayarPajakController extends Controller {

	public function prosesPembayaran()
	{
		$input = Input::all();
		BayarPajak::create($input);

		return Redirect::to('/pembayaran');
	}

}
