<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal {
        max-height: 428px !important;
    }

    .datepicker-date-display {
        background-color: #0f3a7e !important;
    }
</style>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Data Izin/Sakit</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top: 70px;">
    <div class="col">
        <form method="post" action="/presensi/storeizin" id="frmIzin">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input type="text" id="tgl_izin" name="tgl_izin" class="form-control datepicker" placeholder="Tahun">
            </div>
            <div class="form-group">
                <select name="status" id="status" class="form-control">
                    <option value="">Izin/Sakit</option>
                    <option value="i">Izin</option>
                    <option value="s">Sakit</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"
                    placeholder="Keterangan"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('myscript'); ?>
<script>
    var currYear = (new Date()).getFullYear();

    $(document).ready(function() {
        $(".datepicker").datepicker({
            format: "yyyy-mm-dd"
        });

        $("#tgl_izin").change(function(e){
            var tgl_izin = $(this).val();
            $.ajax({
                type:"post",
                url:'/presensi/cekpengajuanizin',
                data:{
                    _token: "<?php echo e(csrf_token()); ?>",
                    tgl_izin: tgl_izin
                },
                cache:false,
                success:function(respond){
                    if (respond == 1){
                        Swal.fire({
                    title: 'Oops!',
                    text: 'Anda Sudah Melakukan Input untuk Tanggal Tersebut!',
                    icon: 'warning',
                }).then((result)=>{
                    $("#tgl_izin").val("");
                });
                    }

                }
            });
        });

        $("#frmIzin").submit(function() {
            var tgl_izin = $("#tgl_izin").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();

            if (tgl_izin === "") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Tanggal harus Diisi',
                    icon: 'warning',
                });
                return false;
            } else if (status === "") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Status harus Diisi',
                    icon: 'warning',
                });
                return false;
            } else if (keterangan === "") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Keterangan harus Diisi',
                    icon: 'warning',
                });
                return false;
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/buatizin.blade.php ENDPATH**/ ?>