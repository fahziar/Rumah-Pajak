<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Rumah-Pajak</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/pajak/54321') }}">Pajak Anda</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

            </ul>

        </div>

    </div>
    @yield('content')

</nav>
@if (count($pajaks))
    <h2>Daftar Pajak Lunas </h2>
    <table border="1" style="width:100%;">
        <tr>
            <td>Kategori Pajak</td>
            <td>Aset Kepemilikian</td>
            <td>Tanggal Pelunasan</td>
        </tr>
        @foreach($pajaks as $pajak)
            @if($pajak->status_pelunasan == 1)
                <tr>
                    <td>{{$pajak->kategori}}</td>
                    <td>{{$pajak->aset_kepemilikan}}</td>
                    <td>{{$pajak->tanggal}}</td>
                </tr>
            @endif
        @endforeach
    </table>
    <br><br><br>
    <h2>Daftar Pajak Tertunggak</h2>
    <table border="1" style="width:100%;">
        <tr>
            <td>Kategori Pajak</td>
            <td>Aset Kepemilikian</td>
            <td>Jumlah Pajak</td>
            <td>Batas Pembayaran</td>
        </tr>
        @foreach($pajaks as $pajak)
            @if($pajak->status_pelunasan == 0)
                <tr>
                    <td>{{$pajak->kategori}}</td>
                    <td>{{$pajak->aset_kepemilikan}}</td>
                    <td>{{$pajak ->jumlah_pajak}}</td>
                    <td>{{$pajak ->tanggal}}</td>
                </tr>
            @endif
        @endforeach
    </table>
@endif
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
