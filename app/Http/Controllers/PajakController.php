<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PajakController extends Controller {

    public function search($npwpd){
        $pajaks = Pajak::where('npwpd','=',$npwpd)->get();
        return view('pajak.lunas',compact('pajaks'));
    }

    public function add($npwpd){
        return view('pajak.add',compact('npwpd'));
    }

    public function submit($npwpd){
        $pajak = new Pajak;
        $pajak->npwpd = $npwpd;
        $pajak->kategori = Input::get('kategori');
        $pajak->aset_kepemilikan = Input::get('aset');
        $pajak->jumlah_pajak = 0.1*Input::get('aset');
        $pajak->status_pelunasan = 0;
        $ldate = date('Y-m-d');
        $pajak->tanggal = $ldate;
        $pajak->save();
        return $this->search($npwpd);
    }
}
