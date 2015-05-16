@extends('wp.layout_user')
@section('title') Daftar Permintaan - Rumah Pajak @stop
@section('content')
<?php
  function to_rupiah($cur)
  {
    return "Rp".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $cur)),2, ',', '.');
  }
?>
<center><h2>Daftar Pemintaan</h2></center>
<br />
<div class="row">
  <div class="span12">
    <caption><h3>Keberatan Pajak</h3></caption>
    <table class="table table-striped">
      <thead>
        <tr>
          <td><b />No</td>
          <td><b />Jenis pajak</td>
          <td><b />Tahun pajak</td>
          <td><b />Harga pajak seharusnya</td>
          <td><b />Alasan pengaduan</td>
          <td><b />Status Permintaan</td>
        </tr>
      </thead>
      <tbody>
       @if(isset($keberatanPajak))
         <?php
         $i = 1;
         foreach($keberatanPajak as $kp)
         {
            echo '<tr>';
              echo '<td>';
                echo $i;
              echo '</td>';
              echo '<td>';
                echo $kp['jenis_pajak'];
              echo '</td>';
              echo '<td>';
                echo $kp['tahun_pajak'];
              echo '</td>';
              echo '<td>';
                echo to_rupiah($kp['harga_pajak_seharusnya']);
              echo '</td>';
              echo '<td>';
                echo $kp['alasan_pengaduan'];
              echo '</td>';
              echo '<td>';
                echo $kp['status_permintaan'];
              echo '</td>';
            echo '</tr>';
            $i++;
         }
         ?>
       @endif
      </tbody>
    </table>
  </div>
  <!-- /span6 --> 
</div>
<!-- /row --> 

<br />

<div class="row">
  <div class="span12">
    <caption><h3>Pencabutan Wajib Pajak</h3></caption>
    <table class="table table-striped">
      <thead>
        <tr>
          <td><b />No</td>
          <td><b />Alasan Penghapusan</td>
          <td><b />Status Permintaan</td>
        </tr>
      </thead>
      <tbody>
         @if(isset($keberatanPajak))
         <?php
         $i = 1;
         foreach($pencabutanWP as $pw)
         {
            echo '<tr>';
              echo '<td>';
                echo $i;
              echo '</td>';
              echo '<td>';
                echo $pw['alasan_penghapusan'];
              echo '</td>';
              echo '<td>';
                echo $pw['status_permintaan'];
              echo '</td>';
            echo '</tr>';
            $i++;
         }
         ?>
       @endif
      </tbody>
    </table>
  </div>
  <!-- /span6 --> 
</div>
<!-- /row --> 

<br />

<div class="row">
  <div class="span12">
    <caption><h3>Pengurangan Sanksi Administrasi</h3></caption>
    <table class="table table-striped">
      <thead>
        <tr>
          <td><b />No</td>
          <td><b />Jenis Pajak</td>
          <td><b />Jenis Sanksi</td>
          <td><b />Jumlah Sanksi</td>
          <td><b />Alasan Permohonan</td>
          <td><b />Status Permintaan</td>
        </tr>
      </thead>
      <tbody>
        @if(isset($keberatanPajak))
         <?php
         $i = 1;
         foreach($penguranganSanksi as $ps)
         {
            echo '<tr>';
              echo '<td>';
                echo $i;
              echo '</td>';
              echo '<td>';
                echo $ps['jenis_pajak'];
              echo '</td>';
              echo '<td>';
                echo $ps['jenis_sanksi'];
              echo '</td>';
              echo '<td>';
                echo to_rupiah($ps['jumlah_sanksi']);
              echo '</td>';
              echo '<td>';
                echo $ps['alasan_permohonan'];
              echo '</td>';
              echo '<td>';
                echo $ps['status_permintaan'];
              echo '</td>';
            echo '</tr>';
            $i++;
         }
         ?>
       @endif
      </tbody>
    </table>
  </div>
  <!-- /span6 --> 
</div>
<!-- /row --> 
@stop