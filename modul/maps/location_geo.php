<?php 
$id=$_GET["id"];
if (!$id)
{ 
  die('Tidak ada ID yang Ditemukan!'); 
}
$query = $koneksi->prepare("SELECT * FROM tb_kost WHERE id='$id'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord = $print[0];
$get_lat = $printrecord["latitude"];
$get_long = $printrecord["longitude"];

?>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      /* Optional: Makes the sample page fill the window. */
      #map { 
        height: 500px;
         width:100%; 
       }
     *{
       margin: 0;
       padding: 0;
      }
    </style>
  <body>
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var directionsDisplay;
      var directionsService = new google.maps.DirectionsService();
      var map;
      var infoWindow;
      var latit,longit;
      var latText;
      var longText;

      function initialize(){
        directionsDisplay = new google.maps.DirectionsRenderer();
        var latlng = new google.maps.LatLng(-7.958368, 112.611455);
        var mapOptions = {
        zoom: 15,
        center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        directionsDisplay.setMap(map);
      }

      function initMap() {
        initialize();
        infoWindow = new google.maps.InfoWindow;

        latText = document.getElementById("latitude");
        longText = document.getElementById("longitude");
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            latit = position.coords.latitude;
            longit = position.coords.longitude;

            latText.innerText = latit;
            longText.innerText = longit;

            ubah();

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your Location');
            infoWindow.open(map);
            map.setCenter(pos);
            calcRoute();
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function ubah(){
        latText = latit;
        longText = longit;
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function getDistance(){
        var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latText, longText), new google.maps.LatLng(<?php echo $get_lat ?>, <?php echo $get_long ?>));
        var res = Math.round(distance);
        return res;
      }

      function calcRoute() {
        var start = latText+','+longText;
        var end = '<?php echo $get_lat ?> , <?php echo $get_long ?>';
        var request = {
         origin:start,
         destination:end,
         travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);

         jarak = document.getElementById("jarak");
         jarak.innerText = getDistance();
       }
        });
      }

      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <p>Lokasi Anda X = <span id="latitude">0.00</span> & Y = <span id="longitude">0.00</span></p> 
    <p>Jarak Dengan Tujuan <span id="jarak">0</span> Meter</p>
    <div id="map"></div>
  </body>