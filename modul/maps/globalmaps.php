<?php include 'proses.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps V3 API Sample</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script type="text/javascript">x

      var map;
      var infoWindow;
     
      function initialize(lt,lg) {
        var mapDiv = document.getElementById('map-canvas');
        map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(-7.957568, 112.611165),
          zoom: 16.5,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        infoWindow = new google.maps.InfoWindow();
          for (var i = 0 ; i < infoal.length; i++) {
            createMarker(id[i],infoal[i],infolati[i],infolong[i],infoharga[i],infojenis[i]);
          }
        }
     
        function createMarker(id,al,lt,lg,harga,tipe) {
          var latLng = new google.maps.LatLng(lt,lg);
          var image ;
          var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon:image
          });
          
          var add;
          if (tipe=='P') {
              add='Khusus Perempuan';
            }
            else if (tipe=='L') {
              add='Khusus Laki-Laki';
            }
            else{
              add='Laki-Laki & Perempuan';
            }
          google.maps.event.addListener(marker, 'click', function() {
            var myHtml = '<strong>'+al+'<br/>Harga : '+harga+'<br/>Hunian '+add+'<br/><a href="index.php?modul=konten&file=content&id='+id+'">Detail</a>';
            infoWindow.setContent(myHtml);
            infoWindow.open(map, marker);
          });
        }
     
    </script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      /* Optional: Makes the sample page fill the window. */
      #map-canvas { 
        height: 600px;
        width:100%;
       }
    </style>
  </head>
    <body style="font-family: Arial; border: 0 none;" onload="initialize(-7.957568, 112.611165)">
      <div class="container">
    <div id="map-canvas"></div>
  </div>
  </body>
</html>