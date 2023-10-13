<?php $__env->startSection('header'); ?>
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
<div class="row" style="margin-top: 70px">
    <div class="col">
        <?php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        ?>
        <?php if(Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e($messagesuccess); ?>

        </div>
        <?php endif; ?>
        <?php if(Session::get('error')): ?>
        <div class="alert alert-danger">
            <?php echo e($messageerror); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php $__currentLoopData = $dataizin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul class="listview image-listview">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            <b><?php echo e(date("d-m-Y", strtotime($d->tgl_izin))); ?> (<?php echo e($d->status == "s" ? "Sakit" : "Izin"); ?>)</b><br>
                            <small class="text-muted"><?php echo e($d->keterangan); ?></small>
                        </div>
                        <?php if($d->status_approved == 0): ?>
                        <span class="badge bg-warning">Waiting</span>
                        <?php elseif($d->status_approved == 1): ?>
                        <span class="badge bg-success">Approved</span>
                        <?php elseif($d->status_approved == 2): ?>
                        <span class="badge bg-danger">Decline</span>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="fab-button bottom-right" style="margin-right: 20px; margin-bottom: 70px; position: fixed; right: 0; bottom: 0;">
    <a href="/presensi/buatizin" class="fab">
        <ion-icon name="add-outline"></ion-icon>
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/izin.blade.php ENDPATH**/ ?>