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
  <body style="font-family: Arial; border: 0 none;" onload="initialize(<?php echo $get_lat ?> , <?php echo $get_long ?>)">
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
      var infokamp = ['ub','uin','um','itn','umm'];
      var infolat = ['-7.9521434','-7.9517844','-7.9628604','-7.9577379','-7.9575169'];
      var infolong = ['112.6114764','112.605264','112.6176574','112.6108852','112.6119768'];

     
      function initialize(lt,lg) {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var mapDiv = document.getElementById('map');
        map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(<?php echo $get_lat ?> , <?php echo $get_long ?>),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        infoWindow = new google.maps.InfoWindow();
            createMarker(<?php echo $get_lat ?>, <?php echo $get_long ?>);
            for (var i = 0; i <= 4 ; i++) {
              obj = document.getElementById(infokamp[i]);
              obj.innerText = getDistance(infolat[i],infolong[i]);
            }
        directionsDisplay.setMap(map);
        }
     
        function createMarker(lt,lg) {
          var latLng = new google.maps.LatLng(lt,lg);
          var image ;
          var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon:image
          });
        }

      function getDistance(lat,long){
        var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(<?php echo $get_lat ?>, <?php echo $get_long ?>), new google.maps.LatLng(lat, long));
        var res = Math.round(distance);
        return res;
      }

      function calcRoute(i) {
        var la = infolat[i];
        var lo = infolong[i];
        var start = '<?php echo $get_lat ?> , <?php echo $get_long ?>';
        var end = la+','+lo;
        var request = {
         origin:start,
         destination:end,
         travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
        });
      }

    </script>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Lihat Jarak</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Jarak Lokasi Kost Dengan Universitas di Daerah Sekitar </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="message-text" class="form-control-label"><button type="button" class="btn btn-primary" onclick="calcRoute(0)">View</button> Universitas Brawijaya : <span id="ub">0</span> Meter </label>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label"><button type="button" class="btn btn-primary" onclick="calcRoute(1)">View</button> Universitas Islam Negeri : <span id="uin">0</span> Meter </label>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label"><button type="button" class="btn btn-primary" onclick="calcRoute(2)">View</button> Universitas Negeri Malang : <span id="um">0</span> Meter </label>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label"><button type="button" class="btn btn-primary" onclick="calcRoute(3)">View</button> Institut Teknologi Nasional : <span id="itn">0</span> Meter</label>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label"><button type="button" class="btn btn-primary" onclick="calcRoute(4)">View</button> Universitas Muhammadiyah Malang : <span id="umm">0</span> Meter </label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div id="map"></div>
  </body>