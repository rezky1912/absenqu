<?php if($histori->isEmpty()): ?>
<div class="alert alert-outline-warning">
    <p>Data Belum Ada</p>
</div>
<?php endif; ?>
<?php $__currentLoopData = $histori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<ul class="listview image-listview">
<li>
<div class="item">
    <?php
        $path = Storage::url('uploads/absensi/'.$d->foto_in);
    ?>
    <img src="<?php echo e(url($path)); ?>" alt="image" class="image">
    <div class="in">
<div>
    <b><?php echo e(date("d-m-Y",strtotime($d->tgl_presensi))); ?></b><br>
    </div>
    <span class="badge <?php echo e($d->jam_in < "08:30" ? "bg-success" : "bg-danger"); ?>">
    <?php echo e($d->jam_in); ?>

</span>
<span class="badge bg-primary"><?php echo e($d->jam_out); ?></span>
</div>
</div>
</li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/gethistori.blade.php ENDPATH**/ ?>