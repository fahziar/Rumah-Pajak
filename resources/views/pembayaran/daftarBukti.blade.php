@extends('wp.layout_user')
@section('title') Pembayaran Pajak - Rumah Pajak @stop
@section('content')

<center>
  <h2><b>Bukti Pembayaran Pajak</b></h2>
</center>
<br />
<div class='row'>
  <div class='span12'>
    <caption>
      <h3>Daftar Pembayaran Pajak</h3>
      <h4>NPWPD : {{ $npwpd }}</h4>
    </caption>
    <table class='table table-striped'>
      <thead>
        <td><b />No</td>
        <td><b />Jenis Pajak</td>
        <td><b />Nomor STP</td>
        <td><b />Tanggal Pembayaran</td>
        <td><b />Buka</td>
      </thead>
      <tbody>
        @if (isset($daftarBukti))
          <?php
            $i = 1;
            foreach ($daftarBukti as $daf) 
            {
              echo '<tr>';
                echo '<td>';
                  echo $i;
                echo '</td>';
                echo '<td>';
                  echo $daf['jenis_pajak'];
                echo '</td>';
                echo '<td>';
                  echo $daf['nomor_stp'];
                echo '</td>';
                echo '<td>';
                  echo $daf['tanggal_pembayaran'];
                echo '</td>';
                echo '<td>';
                  $id = $daf['id'];
                  echo '<a href=\'' . url("/pembayaran/bukti/$id") . '\'>Buka</a>';
                echo '</td>';
              echo '</tr>';
              $i++;
            }
          ?>
        @endif
      </tbody>
    </table>
  </div>
</div>

@stop