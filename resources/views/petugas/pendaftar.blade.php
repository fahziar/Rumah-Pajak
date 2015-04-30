@extends('petugas.master')
@section('content')
    @if (count($pendaftars))
        <h2>Pendaftar Wajib Pajak</h2>
        <table border="1" style="width:100%;">
            <tr>
                <td>NIK</td>
                <td>Nama</td>
                <td>Tanggal Lahir</td>
                <td>Tempat Lahir</td>
                <td>Alamat</td>
                <td>Pilihan/Status</td>
            </tr>
            @foreach($pendaftars as $pendaftar)
                <tr>
                    <td>{{$pendaftar->nik}}</td>
                    <td>{{$pendaftar->nama}}</td>
                    <td>{{$pendaftar->tempat_lahir}}</td>
                    <td>{{$pendaftar->tanggal_lahir}}</td>
                    <td>{{$pendaftar->alamat}}</td>
                    @if($pendaftar->status_pendaftaran == -1)
                    <td><a href="{{Request::url()}}/setuju/{{$pendaftar->id}}"><input type="button" value="Setuju"> </a> <a href="{{Request::url()}}/tolak/{{$pendaftar->id}}"><input type="button" value="Tolak"> </a> </td>
                    @elseif($pendaftar->status_pendaftaran == 0)
                        <td>Ditolak</td>
                    @elseif($pendaftar->status_pendaftaran == 1)
                        <td>Disetujui</td>
                    @endif
                </tr>
            @endforeach
        </table>
    @endif
@endsection