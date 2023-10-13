<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-lg">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-primary text-white avatar">
                  
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                  </svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo e($rekappresensi->jmlhadir); ?>

                </div>
                <div class="text-secondary">
                  Karyawan Hadir
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-success text-white avatar">
                  
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                    <path d="M8 8l4 0"></path>
                    <path d="M8 12l4 0"></path>
                    <path d="M8 16l4 0"></path>
                  </svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo e($rekapizin->jmlizin !== null ? $rekapizin->jmlizin : 0); ?>

                </div>
                <div class="text-secondary">
                  Karyawan Izin
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-warning text-white avatar">
                  
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-browser-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h14a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-14a1 1 0 0 1 -1 -1z"></path>
                    <path d="M4 8h16"></path>
                    <path d="M8 4v4"></path>
                    <path d="M10 14h4"></path>
                    <path d="M12 12v4"></path>
                  </svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo e($rekapizin->jmlsakit !== null ? $rekapizin->jmlsakit : 0); ?>

                </div>
                <div class="text-secondary">
                  Karyawan Sakit
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-danger text-white avatar">
                  
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M12 10l0 3l2 0"></path>
                    <path d="M7 4l-2.75 2"></path>
                    <path d="M17 4l2.75 2"></path>
                  </svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo e($rekappresensi->jmlterlambat !== null ? $rekappresensi->jmlterlambat : 0); ?>

                </div>
                <div class="text-secondary">
                  Karyawan Terlambat
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/dashboard/dashboardadmin.blade.php ENDPATH**/ ?>