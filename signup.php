<?php
    include 'db.php';

    $prename = $_POST['first'];
    $lastname = $_POST['last'];
    $latitude = $_POST['lat'];
    $longitude = $_POST['long'];
    $area = $_POST['area'];


    $placesql = "INSERT INTO places (latitude, longitude, area) VALUES ($latitude, $longitude, $area);";
    $apprsql = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('DREEWWW', LONGEE, 'TATA', 'TATA');";
    $apprResult = mysqli_query($connection, $apprsql);
    $placeResult = mysqli_query($connection, $placesql);
          header("Location: index.php?submit=success");

          if ($connection === FALSE) {
            die("Connection failed: " . $connection->connect_error);
          }

          if ($connection->query($placesql AND $apprsql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $apprsql AND $placesql . "<br>" . $connection->error;
          }
          
          $connection->close();
    ?>
          