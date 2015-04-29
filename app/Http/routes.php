<?php

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
	$view_variable = array(
		'nama' =>'Ridwan Kamil',
		'NIK' =>'3274050001110002223',
		'TTL' => 'Bandung, 11 Januari 1980',
		'alamat' => 'Jl. Merdeka No. 1'
	);

	return view('wp.daftar')->with($view_variable);
});

Route::post('/wp/daftar', function(){
	return view('wp.daftar');
});

Route::get('/wp','WajibPajakController@index');


Route::get('/pajak/{npwpd}/search','PajakController@search');
Route::get('/pajak/{npwpd}/add','PajakController@add');
Route::post('/pajak/{npwpd}/add/submit','PajakController@submit');


Route::get('/petugas/home','PetugasPajakController@index');
Route::get('/petugas/pendaftar','PetugasPajakController@pendaftar');
Route::get('/petugas/pendaftar/setuju/{id}','PetugasPajakController@setuju');
Route::get('/petugas/pendaftar/tolak/{id}','PetugasPajakController@tolak');
Route::get('/petugas/permintaan','PetugasPajakController@permintaan');
Route::get('/petugas/edit','PetugasPajakController@edit');

/* 	***************************
	Route petugas
	***************************
*/
Route::get('/petugas', function(){
	return view('petugas.login');
});
