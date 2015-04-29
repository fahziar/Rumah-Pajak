<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pajaks = Pajak::all();
		return view('pajak.master', compact('pajaks'));
	}

    public function search($npwpd){
        $pajaks = Pajak::where('npwpd','=',$npwpd)->get();
        return view('pajak.master',compact('pajaks'));
    }
}
