<?php
  include '../db.php'
  ?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      .map {
        height: 100vh;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -9;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <title>Project Happy Place</title>
  </head>
  <body>
    <form action="signup.php" method="POST">
        <input type="text" name="first" placeholder="Firstname">
        <input type="text" name="last" placeholder="Lastname">
        <input type="text" name="lat" placeholder="Latitude">
        <input type="text" name="long" placeholder="Longtitude">
        <input type="text" name="name" placeholder="Area">
        <button type="submit" name="submit">Save</button>
        <button type="button"><a href="login.php" >Login as Admin</a></button>
    </form>
    <?php
      $appr = "SELECT * FROM apprentices;";
      $place = "SELECT * FROM places;";
      mysqli_query($connection, $appr);
      mysqli_query($connection, $place);
    ?>
    
    <div id="map" class="map"></div>
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            /*
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
["http://a.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://b.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://c.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png"]
["http://a.tile.openstreetmap.org/{z}/{x}/{y}.png","http://b.tile.openstreetmap.org/{z}/{x}/{y}.png","http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"]
["http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile2.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile3.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile4.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png"]
["http://a.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://b.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://c.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://d.tile.stamen.com/watercolor/{z}/{x}/{y}.png"]
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
*/
            source: new ol.source.XYZ({
                urls : ["http://a.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://b.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://c.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://d.tile.stamen.com/watercolor/{z}/{x}/{y}.png"]
            }),

            source: new ol.source.OSM(),
          }),
          new ol.layer.Vector({
            source: new ol.source.Vector({
              format: new ol.format.GeoJSON(),
              url: './assets/data/countries.geojson' // GeoCountries file from github
            })
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([8.5208324, 47.360127]),
          zoom: 10
        })
      });
    </script>
  </body>
</html>

