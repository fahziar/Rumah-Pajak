@extends('layouts.layout_user')

@section('content')
	@if (isset($message))
	    <h4>{{ $message }}</h4>
	    <br />
	  @endif
	<h2>Pengajuan Keberatan Pajak</h2>

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
			<label for="jenis_pajak">Jenis pajak :</label>
			<input type="text" name="jenis_pajak" id="jenis_pajak" required>
		</div>
		<div class="form-group">
			<label for="tahun_pajak">Tahun Pajak :</label>
			<select class="form-control" name="tahun_pajak" id="tahun_pajak" form="form_pengajuan">
				<?php
					$year = date("Y");
					for($i=2000; $i<$year; $i++)
					{
						echo "<option value='$i'>$i</option>";
					}
					echo "<option value='$year' selected>$year</option>";
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="harga_pajak_seharusnya">Harga pajak seharusnya :</label>
			<input type="text" name="harga_pajak_seharusnya" id="harga_pajak_seharusnya" required>
		</div>
		<div class="form-group">
			<label for="alasan_pengaduan">Alasan pengaduan :</label>
			<textarea class="form-control" rows="5" name="alasan_pengaduan" id="alasan_pengaduan" placeholder="Masukkan alasan keberatan pajak di sini..." required></textarea>
		</div>
		<div class="form-group">
			<input class="btn primary" type="submit" value="Submit">
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
@endsection