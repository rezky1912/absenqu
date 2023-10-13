<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Laporan Absensi
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/presensi/cetaklaporan" id="frmLaporan" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="bulan" id="bulan" class="form-select">
                                            <option value="">Bulan</option>
                                            <?php for($i=1; $i <= 12; $i++): ?> <option value="<?php echo e($i); ?>" <?php echo e(date("m") == $i ? 'selected' : ''); ?>><?php echo e($namabulan [$i]); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="tahun" id="tahun" class="form-select">
                                            <option value="">Tahun</option>
                                            <?php
                                            $tahunmulai = 2023;
                                            $tahunskrng = date("Y");
                                            ?>
                                            <?php for($tahun=$tahunmulai; $tahun<=$tahunskrng; $tahun++): ?><option value ="<?php echo e($tahun); ?>" <?php echo e(date("Y") == $tahun ? 'selected' : ''); ?>><?php echo e($tahun); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="nik" id="nik" class="form-select">
                                            <option value="">Pilih Karyawan</option>
                                            <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($d->nik); ?>"><?php echo e($d->nama_lengkap); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                        <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                                        </svg>
                                        Cetak
                                    </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" name="exportexcel" class="btn btn-success w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M8 11h8v7h-8z"></path>
                                        <path d="M8 15h8"></path>
                                        <path d="M11 11v7"></path>
                                        </svg>
                                        Export to Excel
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('myscript'); ?>
<script>
    $(function(){
        $("#frmLaporan").submit(function(e){
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            var nik = $("#nik").val();
            if (bulan == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Bulan Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $('#bulan').focus();
                });
                return false;
                
            }else if (tahun == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Bulan Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $('#tahun').focus();
                });
                return false;
            }else if (nik == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Karyawan Harus Dipilih',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $('#nik').focus();
                });
                return false;
            }
        });
    })
</script>




<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/laporan.blade.php ENDPATH**/ ?>