<?php

use App\Classes\SSOData;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/* 	***************************
	Route wajib pajak
	***************************
*/

Route::get('/wp/home', function() {
	return view('wp.home');
});

Route::get('/wp/daftar', function() {
	$arr=SSOData::GetDataPenduduk();
	if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
		return $redir;
	}
	$view_variable = array(
		'nama' =>$arr['Nama'],
		'NIK' =>$arr['NIK'],
		'TTL' => $arr['Tempat Lahir'].', '.$arr['Tgl Lahir'],
		'alamat' => $arr['Alamat']
	);

	return view('wp.daftar')->with($view_variable);
});

Route::post('/wp/daftar', function(){
	return view('wp.daftar');
});

///////////////////////////////////
// kelompok permintaanWP
///////////////////////////////////
Route::get('/permintaan', function(){
	return view('permintaanWP.home');
});

Route::post('/permintaan', function(){
	return view('permintaanWP.home');
});

Route::get('/permintaan/pencabutan', function(){
	$variable = array(
		'npwpd' => '32445688474536',
		'kategori_permintaan' => 'pencabutan wp'
		);
	return view('permintaanWP.pencabutanWP')->with($variable);
});

Route::get('/permintaan/keberatan', function(){
	$variable = array(
		'npwpd' => '32445688474536',
		'kategori_permintaan' => 'keberatan pajak'
		);
	return view('permintaanWP.keberatanPajak')->with($variable);
});

Route::get('/permintaan/pengurangan-sanksi', function(){
	$variable = array(
		'npwpd' => '32445688474536',
		'kategori_permintaan' => 'pengurangan sanksi'
		);
	return view('permintaanWP.penguranganSanksi')->with($variable);
});

Route::get('/register','WajibPajakController@register');

Route::post('/permintaan/prosesPermintaan', 'permintaanWPController@prosesPermintaan');
Route::get('/permintaan/daftarPermintaan', 'permintaanWPController@daftarPermintaan');
Route::get('/wp','WajibPajakController@index');


Route::get('/pajak/{npwpd}/search','PajakController@search');
Route::get('/pajak/{npwpd}/add','PajakController@add');
Route::post('/pajak/{npwpd}/add/submit','PajakController@submit');


Route::post('/petugas/home','PetugasPajakController@index');
Route::get('/petugas/home/logout','PetugasPajakController@logout');
Route::get('/petugas/pendaftar','PetugasPajakController@pendaftar');
Route::get('/petugas/pendaftar/setuju/{id}','PetugasPajakController@setuju');
Route::get('/petugas/pendaftar/tolak/{id}','PetugasPajakController@tolak');
Route::get('/petugas/permintaan','PetugasPajakController@permintaan');
Route::get('/petugas/edit','PetugasPajakController@edit');
Route::get('/petugas/edit/ubah/{id}','PetugasPajakController@ubah');
Route::post('/petugas/edit/ubah/{id}/submit','PetugasPajakController@submitubah');
Route::get('/petugas/edit/hapus/{id}','PetugasPajakController@hapus');
Route::get('/petugas/edit/tambah','PetugasPajakController@tambah');
Route::post('/petugas/edit/tambah/submit','PetugasPajakController@submittambah');
Route::get('/petugas/wajib_pajak','PetugasPajakController@wajib_pajak');

Route::get('/test/test','PajakController@Test');
Route::get('/test/a','PajakController@UpdateToken');
Route::get('/test/getacctoken','PajakController@UpdateToken');

/* 	***************************
	Route petugas
	***************************
*/
Route::get('/petugas', function(){
	return view('petugas.login');
});
