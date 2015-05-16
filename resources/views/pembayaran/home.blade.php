@extends('wp.layout_user')
@section('title') Pembayaran Pajak - Rumah Pajak @stop
@section('content')
  @if(isset($message))
    <h4>$message</h4>
  @endif
  <form action="{{ url('/pembayaran/prosesPembayaran') }}" method='post' id='form_pembayaran'>
    <div class='form-group'>
      <label for='npwpd'>NPWPD : {{ $npwpd }}
      </label>
      <input type="hidden" name="npwpd" id="npwpd" value="{{ $npwpd }}">
    </div>
    <div class='form-group'>
      <label for='masa_pajak'>Masa Pajak :</label>
      <input type="text" name='masa_pajak' id='masa_pajak' required placeholder='dalam tahun'>
    </div>
    <div class='form-group'>
      <label for='nomor_stp'>Nomor STP :</label>
      <input type='text' name='nomor_stp' id='nomor_stp' required>
    </div>
    <div class='form-group'>
      <label for='jumlah_pembayaran'>Jumlah Pembayaran :</label>
      <input type='text' name='jumlah_pembayaran' id='jumlah_pembayaran' required>
    </div>
    <div class='form-group'>
      <label for='status_pembayaran'></label>
      <select class='form-control' name='status_pembayaran' id='status_pembayaran' form='form_pembayaran'>
        <option value='lunas' selected>Lunas</option>
        <option value='tertunggak'>Tertunggak</option>
      </select>
    </div>
    <div class='form-group'>
      <label for='tanggal_pembayaran'>Tanggal Pembayaran :</label>
      <input type='date' name='tanggal_pembayaran' id='tanggal_pembayaran' required placeholder='yyyy-mm-dd'>
    </div>
    <div class='form-group'>
      <input class='btn-primary' type='submit' value='Submit'>
    </div>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
  </form>
@stop