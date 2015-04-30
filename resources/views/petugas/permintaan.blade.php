@extends('petugas.layout')
@section('content')
    @extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Tabel Permintaan Wajib Pajak</h4>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Opsi</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permintaans as $permintaan)
                                <tr>
                                    <td>{{$permintaan->username}}</td>
                                    <td>{{$permintaan->password}}</td>
                                    <td><a href="{{Request::url()}}/setuju/{{$permintaan->id}}"><input type="button" value="Setuju"> </a> <a href="{{Request::url()}}/Tolak/{{$permintaan->id}}"><input type="button" value="Tolak"> </a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
        </div><!-- /row -->
    </section>
@endsection
@endsection