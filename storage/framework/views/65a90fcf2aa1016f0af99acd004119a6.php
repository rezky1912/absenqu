<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Absensi JAVAWEBSTER</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4, or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { size: A4 }
    #title {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 18px;
      font-weight: bold;
    }
    .tabeldatakaryawan {
      margin-top: 40px;
    }
    .tabeldatakaryawan tr td {
      padding: 5px;
    }
    .tabelpresensi {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    .tabelpresensi tr th,
    .tabelpresensi tr td {
      border: 1px solid black;
      padding: 8px;
      font-size: 12px; /* Added 'px' unit for font-size */
    }
    .foto {
      width: 40px;
      height: 30px;
    }
  </style>
</head>

<body class="A4">
  <?php

use Illuminate\Support\Facades\Storage;

  function selisih($jam_masuk, $jam_keluar)
  {
      list($h, $m, $s) = explode(':', $jam_masuk);
      $dtAwal = mktime($h, $m, $s, '1', '1', '1');
      list($h, $m, $s) = explode(':', $jam_keluar);
      $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
      $dtSelisih = $dtAkhir - $dtAwal;
      $totalmenit = $dtSelisih / 60;
      $jam = explode('.', $totalmenit / 60);
      $sisamenit = ($totalmenit / 60) - $jam[0];
      $sisamenit2 = $sisamenit * 60;
      $jml_jam = $jam[0];

      return $jml_jam.':'.round($sisamenit2);
  }
  ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20, or 25 -->
  <section class="sheet padding-10mm">
    <table style="width: 100%;">
      <tr>
        <td>
          <td style="width: 70px;">
            <img src="<?php echo e(asset('assets/img/JWM.png')); ?>" width="70" height="70" alt="">
          </td>
          <td>
            <span id="title">
              Laporan Absensi Karyawan Periode <?php echo e($namabulan[$bulan]); ?> <?php echo e($tahun); ?><br>
              CV. Java Webster <br></span>
            <span><i>Jl. Bumi Asri Sengkaling No.lll, RW 5, Dadaprejo, Kec. Junrejo, Kota Batu, Jawa Timur 65323</i></span>
          </td>
        </td>
      </tr>
    </table>
    <table class="tabeldatakaryawan">
      <tr>
        <td rowspan="6">
          <?php
          $path = Storage::url('uploads/karyawan/'.$karyawan->foto);
  ?>
          <img src="<?php echo e(url($path)); ?>" alt="" width="120" height="150">
        </td>
      </tr>
      <tr>
        <td>Nama Karyawan</td>
        <td>:</td>
        <td><?php echo e($karyawan->nik); ?></td>
      </tr>
      <tr>
        <td>Nama Karyawan</td>
        <td>:</td>
        <td><?php echo e($karyawan->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?php echo e($karyawan->jabatan); ?></td>
      </tr>
      <tr>
        <td>Divisi</td>
        <td>:</td>
        <td><?php echo e($karyawan->nama_div); ?></td>
      </tr>
      <tr>
        <td>No.Hp</td>
        <td>:</td>
        <td><?php echo e($karyawan->no_hp); ?></td>
      </tr>
    </table>
    <table class="tabelpresensi">
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Keterangan</th>
        <th>Jml Jam</th>
      </tr>
      <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      $jamterlambat = selisih('08:30:00', $d->jam_in);
  ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
        <td><?php echo e($d->jam_in); ?></td>
        <td><?php echo e($d->jam_out !== null ? $d->jam_out : 'Belum Absen'); ?></td>
        <td>
          <?php if($d->jam_in > '08:30'): ?>
          Terlambat <?php echo e($jamterlambat); ?>

          <?php else: ?>
          Tepat Waktu
          <?php endif; ?>
        </td>
        <td>
          <?php if($d->jam_out !== null): ?>
          <?php
      $jmljamkerja = selisih($d->jam_in, $d->jam_out);
  ?>
          <?php else: ?>
          <?php
  $jmljamkerja = 0;
  ?>
          <?php endif; ?>
          <?php echo e($jmljamkerja); ?>

        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td colspan="2" style="text-align: right;">Malang, <?php echo e(date('d-m-Y')); ?></td>
      </tr>
      <tr>
        <td style="text-align: left; vertical-align: bottom" height="100px">
          <u>Hanggara Praja</u><br>
          <i><b>Kepala Oprasional</b></i>
        </td>
        <td style="text-align: right; vertical-align: bottom">
          <u>Johan Surya</u><br>
          <i><b>Manager</b></i>
        </td>
      </tr>
    </table>
  </section>
</body>
</html>
<?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/cetaklaporanexcel.blade.php ENDPATH**/ ?>