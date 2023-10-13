<style>
    #map { height: 250px; }
</style>

<div id="map"></div>

<script>
    var lokasi = "<?php echo e($presensi->lokasi_in); ?>";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude, longitude], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map);
    var circle = L.circle([-7.914674, 112.579013], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 25
}).addTo(map);

var popup = L.popup()
    .setLatLng([latitude, longitude])
    .setContent("<?php echo e($presensi->nama_lengkap); ?>")
    .openOn(map);
</script>
<?php /**PATH C:\Users\Rezky\OneDrive\Documents\project\september\laravel absen\absen\resources\views/presensi/showmap.blade.php ENDPATH**/ ?>