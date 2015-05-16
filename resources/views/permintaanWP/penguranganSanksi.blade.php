@extends('wp.layout_user')
@section('title') Pengurangan Sanksi Administrasi - Rumah Pajak @stop
@section('content')
	@if (isset($message))
	    <h4>{{ $message }}</h4>
	    <br />
	  @endif
	<h2>Pengajuan Pengurangan Sanksi Administrasi</h2>

	<form action="{{url('/permintaan/prosesPermintaan')}}" method='post' id='form_pengajuan'>
		<div class="form-group">
			<label for="npwpd">NPWPD : {{ $npwpd }}</label>
			<input type="hidden" name="npwpd" id="npwpd" value="{{ $npwpd }}">
		</div>
		<div class="form-group">
			<label for="kategori_permintaan">Kategori permintaan : {{ $kategori_permintaan }}</label>
			<input type="hidden" name="kategori_permintaan" id="kategori_permintaan" value="{{ $kategori_permintaan }}">
		</div>
		<div class="form-group">
			<label for="jenis_sanksi">Jenis sanksi : </label>
			<input type="text" name="jenis_sanksi" id="jenis_sanksi" required>
		</div>
		<div class="form-group">
			<label for="nomor_stp">Nomor STP :</label>
			<input type="text" name="nomor_stp" id="nomor_stp" required>
		</div>
		<div class="form-group">
			<label for="jumlah_sanksi">Jumlah sanksi :</label>
			<input type="text" name="jumlah_sanksi" id="jumlah_sanksi" required>
		</div>
		<div class="form-group">
			<label for="alasan_permohonan">Alasan permohonan :</label>
			<textarea class="form-control" name="alasan_permohonan" id="alasan_permohonan" rows="5" placeholder="Masukkan alasan pengurangan sanksi administrasi di sini..." required></textarea>
		</div>
		<div class="form-group">
			<input class="btn primary" type="submit" value="Submit">
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
@endsection