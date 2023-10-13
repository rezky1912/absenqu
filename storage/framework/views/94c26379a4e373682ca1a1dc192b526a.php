<?php $__env->startSection('header'); ?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Histori</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top: 4rem;">
    <div class="col">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Bulan</option>
                    <?php for($i=1; $i <= 12; $i++): ?> <option value="<?php echo e($i); ?>" <?php echo e(date("m") == $i ? 'selected' : ''); ?>><?php echo e($namabulan [$i]); ?></option>
                        <?php endfor; ?>
                </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control"><option value="">Tahun</option>
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
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <button class="btn btn-primary btn-block" id="getdata">
                        <ion-icon name="search-outline"></ion-icon>Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col" id="showhistori"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('myscript'); ?>
<Script>
    $(function(){
        $("#getdata").click(function(e){
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax(
                {
                    type:'POST',
                    url : '/gethistori',
                    data:{
                        _token: "<?php echo e(csrf_token()); ?>",
                        bulan:bulan,
                        tahun:tahun
                        },
                        cache:false,
                        success:function(respond){
                            $("#showhistori").html(respond);
                        }


                }
            )

        });

    });

</Script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/histori.blade.php ENDPATH**/ ?>