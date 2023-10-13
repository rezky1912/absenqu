<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Absensi JAVAWEBSTER</title>
  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  <!-- Set page size here: A5, A4 or A3 -->
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
      font-size: 10;
    }
    .tabeldatakaryawan tr td {
      padding: 5px;
      font-size: 10;
    }
    .tabelpresensi {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    .tabelpresensi tr th {
      border: 1px solid black;
      padding: 8px;
      background-color: #DEDCDC;
      font-size: 8px;
    }
    .tabelpresensi tr td {
      border: 1px solid black;
      padding: 8px;
      font-size: 8px;
    }
    .foto {
      width: 40px;
      height: 30px;
    }
  </style>
</head>
<body class="A4 landscape">
  <?php
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
            <img src="<?php echo e(asset('assets\img\JWM.png')); ?>" width="70" height="70" alt="">
          </td>
          <td>
            <span id="title">
              Rekap Absensi Karyawan Periode <?php echo e($namabulan[$bulan]); ?> <?php echo e($tahun); ?><br>    
              CV. Java Webster <br>
            </span>
            <span><i>Jl. Bumi Asri Sengkaling No.lll, RW 5, Dadaprejo, Kec. Junrejo, Kota Batu, Jawa Timur 65323</i></span>
          </td>
        </td>
      </tr>
    </table>
    <table class="tabelpresensi w-100">
      <tr>
        <th rowspan="2">NIK</th>
        <th rowspan="2">Nama Karyawan</th>
        <th colspan="31">Tanggal</th>
        <th rowspan="2">TH</th>
        <th rowspan="2">TT</th>
      </tr>
      <tr>
        <?php
        for ($i = 1; $i <= 31; ++$i) {
            ?>
          <th><?php echo e($i); ?></th>
        <?php
        }
  ?>
      </tr>
      <?php $__currentLoopData = $rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($d->nik); ?></td>
          <td><?php echo e($d->nama_lengkap); ?></td>
          <?php
          $totalhadir = 0;
  $totalterlambat = 0;
  for ($i = 1; $i <= 31; ++$i) {
      $tgl = 'tgl_'.$i;
      if (empty($d->$tgl)) {
          $hadir = ['', ''];
          $totalhadir += 0;
      } else {
          $hadir = explode('-', $d->$tgl);
          ++$totalhadir;
          if ($hadir[0] > '08:30:00') {
              ++$totalterlambat;
          }
      }
      ?>
            <td>
              <span style="color:<?php echo e($hadir[0]>"08:30:00" ? "red" : ""); ?>"><?php echo e($hadir[0]); ?></span>
              <span style="color:<?php echo e($hadir[0]<"17:00:00" ? "red" : ""); ?>"><?php echo e($hadir[1]); ?></span>
            </td>
          <?php
  }
  ?>
        <td><?php echo e($totalhadir); ?></td>
        <td><?php echo e($totalterlambat); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td></td>
        <td style="text-align: right;">Malang, <?php echo e(date('d-m-Y')); ?></td>
      </tr>
      <tr>
        <td style="text-align: left; vertical-align: bottom" height="100px">
          <u>Hanggara Praja</u><br>
          <i><b>Kepala Operasional</b></i>
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
<?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/cetakrekap.blade.php ENDPATH**/ ?>