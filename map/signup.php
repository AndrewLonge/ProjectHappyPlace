<?php
    /*include '../database.class.php';

    $prename = $_POST['first'];
    $lastname = $_POST['last'];
    $latitude = $_POST['lat'];
    $longitude = $_POST['long'];
    $name = $_POST['name'];
    
    if(isset($_POST['submit']))
    $idcount = "SELECT COUNT(id) as countid FROM apprentices";
    $results = $connection->query($idcount);
    $row = $results->fetch_assoc();
    $id = $row["countid"]+1;


    $placSQL = "INSERT INTO places (id, name, latitude, longitude) VALUES ($id, '$name', '$latitude','$longitude');";
    $markSQL = "INSERT INTO markers (id) VALUE ($id);";
    $apprSQL = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', $id, $id);";
    
    mysqli_query($connection, $placSQL);
    mysqli_query($connection, $markSQL);
    mysqli_query($connection, $apprSQL);
    
          header("Location: index.php?submit=success");

          if ($connection === FALSE) {
            die("Connection failed: " . $connection->connect_error);
          }

          if ($connection->query($placesql AND $apprsql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $apprsql AND $placesql . "<br>" . $connection->error;
          }
          
          $connection->close();*/
    ?>
          