@extends('layouts.layout_user')

@section('content')
@if (isset($message))
	    <h4>{{ $message }}</h4>
	    <br />
	  @endif
<h2>Pengajuan Pencabutan NPWPD</h2>

<form action="/permintaan/prosesPermintaan" method='post' id='form_pengajuan'>
	<div class="form-group">
		<label for="npwpd">NPWPD : {{ $npwpd }}</label>
		<input type="hidden" name="npwpd" id="npwpd" value="{{ $npwpd }}">
	</div>
	<div class="form-group">
		<label for="kategori_permintaan">Kategori permintaan : {{ $kategori_permintaan }}</label>
		<input type="hidden" name="kategori_permintaan" id="kategori_permintaan" value="{{ $kategori_permintaan }}">
	</div>
	<div class="form-group">
		<label for="alasan_penghapusan">Alasan Penghapusan :</label>
		<textarea class="form-control" rows="5" name="alasan_penghapusan" id="alasan_penghapusan" placeholder="Masukkan alasan penghapusan di sini..." required></textarea>
	</div>
	<div class="form-group">
		<input class="btn primary" type="submit" value="Submit">
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
	
@endsection