@extends('pajak.master')
@section('content')
<form method="post" name="tambah" action="{{Request::url()}}/submit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    NPWPD <input type="text" placeholder="NPWPD" name="npwpd" value={{$npwpd}} readonly><br>
    Aset Kepemilikan <input type="text" placeholder="Aset" name="aset"><br>
    Kategori <select name="kategori" size="1">
            <option value="Pajak Penghasilan">Pajak Penghasilan</option>
            <option value="Pajak Restoran">Pajak Restoran</option>
            <option value="Pajak Hiburan">Pajak Hiburan</option>
            <option value="Pajak Hotel">Pajak Hotel</option>
            <option value="Pajak Bumi Bangunan">Pajak Bumi Bangunan</option
        </select>

    <input type="submit" name="submit" value="Submit">
</form>
@endsection