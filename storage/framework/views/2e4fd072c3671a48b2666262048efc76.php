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
<?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$foto_in = Storage::url('uploads/absensi/'.$d->foto_in);
$foto_out = Storage::url('uploads/absensi/'.$d->foto_out);
?>
<tr>
    <td><?php echo e($loop->iteration); ?></td>
    <td><?php echo e($d->nik); ?></td>
    <td><?php echo e($d->nama_lengkap); ?></td>
    <td><?php echo e($d->nama_div); ?></td>
    <td><?php echo e($d->jam_in); ?></td>
    <td>
        <img src="<?php echo e(url($foto_in)); ?>" class="avatar" alt="">
    </td>
    <td><?php echo $d->jam_out !== null ? $d->jam_out : '<span class="badge bg-danger">Belum Absen</span>'; ?></td>
    <td>
        <?php if($d->jam_out !== null): ?>
        <img src="<?php echo e(url($foto_out)); ?>" class="avatar" alt="">
         <?php else: ?>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hourglass-empty" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z"></path>
            <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z"></path>
            </svg>
        <?php endif; ?>
    </td>
    <td>
        <?php if($d->jam_in >= '08:30'): ?>
        <?php
        $jamterlambat = selisih('08:30:00', $d->jam_in);
        ?>
        <span class="badge bg-danger">Terlambat <?php echo e($jamterlambat); ?></span>
        <?php else: ?>
        <span class="badge bg-success">Tepat Waktu</span>
        <?php endif; ?>
    </td>
    <td>
        <a href="#" class="btn btn-primary tampilkanpeta" id="<?php echo e($d->id); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"></path>
   <path d="M9 4v13"></path>
   <path d="M15 7v5.5"></path>
   <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"></path>
   <path d="M19 18v.01"></path>
</svg>
        </a>
    </td>
</tr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    $(function(){
        $(".tampilkanpeta").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type:'post',
                url:'/tampilkanpeta',
                data:{'_token':'<?php echo e(csrf_token()); ?>',
                'id':id},
                cache:false,
                success:function(respond){
                    $("#loadmap").html(respond);
                }
            })

            $("#modal-tampilkanpeta").modal("show");
        });
    });
</script><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/getpresensi.blade.php ENDPATH**/ ?>