
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
    <form action="includes/" method="POST">
  <input type="text" name="first" placeholder="Firstname">
  <input type="text" name="last" placeholder="Lasttname">
  <input type="text" name="lat" placeholder="Latitude">
  <input type="text" name="long" placeholder="Longtitude">
    </form>
    <?php
      $servername = "localhost";
      $user = "root";
      $password = "";
      $db = "happyplace";

      $connection = new mysqli($servername, $user, $password, $db);


      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    if (isset($_POST['submit-search'])) {
        $searchedperson = $_POST['personsearch'];
        $searchedperson_last = $_POST['personsearch-last'];
        $sql_full = "SELECT * FROM Lernende WHERE Vorname='" . $searchedperson . "' AND Name='$searchedperson_last';";
        $result_full = $connection->query($sql_full);
        $sql_appr = "SELECT Vorname, Name FROM Lernende WHERE Vorname='" . $searchedperson . "' AND Name='$searchedperson_last';";
        $result_appr = $connection->query($sql_appr);
        if ($result_full->num_rows > 0) {
            $row_full = $result_full->fetch_array(MYSQLI_BOTH);
            $row_appr = $result_appr->fetch_array(MYSQLI_BOTH);
            $place_id = $row_full[3];
            $marker_id = $row_full[4];
            $sql_place = "SELECT latitude, longitude FROM Ort WHERE id=" . $OrtId . ";";
            $sql_marker = "SELECT color FROM Marker WHERE id=" . $MarkerId . ";";
            $result_places = $connection->query($sql_place);
            $result_marker = $connection->query($sql_marker);
            $row_places = $result_places->fetch_array(MYSQLI_BOTH);
            $row_marker = $result_marker->fetch_array(MYSQLI_BOTH);
            echo "
            <script type='text/javascript'>
                add_map_point(" . $row_places[1] . ", " . $row_places[0] . ");
            </script>";;
        } else {
            echo "<p id='result-id' class='result'>0 results</p>";
        }

    }
    $connection->close();
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

