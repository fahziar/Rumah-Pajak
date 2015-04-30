<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PendaftarWP;
use App\WajibPajak;
use Illuminate\Http\Request;

class PetugasPajakController extends Controller {

    public function index(){
        return view('petugas.master');
    }

    public function pendaftar(){
        $pendaftars = PendaftarWP::all();
        return view('petugas.pendaftar', compact('pendaftars'));
    }

    public function setuju($id){
        $pendaftar = PendaftarWP::find($id);
        $pendaftar->status_pendaftaran = 1;
        $wp = new WajibPajak;
        $wp->nik = $pendaftar->nik;
        $wp->nama = $pendaftar->nama;
        $wp->npwpd = 'mi Generate di sini';
        $wp->alamat = $pendaftar->alamat;
        $wp->tempat_lahir = $pendaftar->tempat_lahir;
        $wp->tanggal_lahir = $pendaftar->tanggal_lahir;
        $wp->save();
        $pendaftar->save();
        return redirect('/petugas/pendaftar');
    }

    public function tolak($id){
        $pendaftar = PendaftarWP::find($id);
        $pendaftar->status_pendaftaran = 0;
        $pendaftar->save();
        return redirect('/petugas/pendaftar');
    }

    public function permintaan(){
        return view('petugas.permintaan');
    }

    public function edit(){
        return view('petugas.edit');
    }
}
