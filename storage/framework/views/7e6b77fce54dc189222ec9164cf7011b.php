<?php $__env->startSection('header'); ?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Absensi Javawebster</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<style>
    .webcam-capture,
    .webcam-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }

    #map {
        height: 210px;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top: 70px">
    <div class="col">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php if($cek > 0): ?>
        <button id="takeabsen" class="btn btn-danger btn-block">
            <ion-icon name="camera-outline"></ion-icon>
            Absen Pulang
        </button>
        <?php else: ?>
        <button id="takeabsen" class="btn btn-success btn-block">
            <ion-icon name="camera-outline"></ion-icon>
            Absen Masuk
        </button>
        <?php endif; ?>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>
<audio id="notifkasi_in">
    <source src="<?php echo e(asset('assets/sound/notif_in.mp3')); ?>" type="audio/mpeg">
</audio>
<audio id="notifkasi_out">
    <source src="<?php echo e(asset('assets/sound/notif_out.mp3')); ?>" type="audio/mpeg">
</audio>
<audio id="radius_sound">
    <source src="<?php echo e(asset('assets/sound/radius.mp3')); ?>" type="audio/mpeg">
</audio>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('myscript'); ?>
<script>
    var notif_in = document.getElementById('notifkasi_in');
    var notif_out = document.getElementById('notifkasi_out');
    var radius_sound = document.getElementById('radius_sound');

    Webcam.set({
        height: 480,
        width: 640,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach('.webcam-capture');

    var lokasi = document.getElementById('lokasi');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position) {
        lokasi.value = position.coords.latitude + "," + position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 17);
        var lokasi_kantor = "<?php echo e($lok_kantor->lokasi_kantor); ?>";
        var lok = lokasi_kantor.split(",");
        var lat_kantor = parseFloat(lok[0]);
        var long_kantor = parseFloat(lok[1]);
        var radius = "<?php echo e($lok_kantor->radius); ?>";
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        var circle = L.circle([lat_kantor, long_kantor], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);
    }

    function errorCallback() {}

    $("#takeabsen").click(function(e) {
        Webcam.snap(function(uri) {
            image = uri;
        });
        var lokasi = $("#lokasi").val();
        $.ajax({
            type: 'POST',
            url: '/presensi/store',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                image: image,
                lokasi: lokasi
            },
            cache: false,
            success: function(respond) {
                var status = respond.split("|");
                if (status[0] == "success") {
                    Swal.fire({
                        title: 'Berhasil',
                        text: status[1],
                        icon: 'success',
                    });
                    setTimeout(function() {
                        location.href = '/dashboard';
                    }, 3000);
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal Absen',
                        icon: 'error',
                    });
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/create.blade.php ENDPATH**/ ?>