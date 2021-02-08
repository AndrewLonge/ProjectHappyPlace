<?php
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36');
session_start();
$servername = "localhost";
$sqlusername = "root";
$sqlpassword = "";
$dbname = "happyplace";
// Create connection
$db = new mysqli($servername, $sqlusername, $sqlpassword, $dbname);
// Check connection

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


// initialize variables
$prename = "";
$lastname = "";
$place_id = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $place_id = $_POST['place_id'];
    $mysqli->query($db, "INSERT INTO apprentices (prename, lastname, place_id) VALUES ('$prename', '$lastname','$place_id')");
    printf ($db, $mysqli->error);
    $_SESSION['message'] = " saved";
    header('location: oop-crud.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $place_id = $_POST['place_id'];

    $mysqli->query("UPDATE apprentices SET prename='$prename', lastname='$lastname', place_id='$place_id' WHERE id=$id");
    printf ($db, $mysqli->error);
    $_SESSION['message'] = "updated!";
    header('location: oop-crud.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $mysqli->query($db, "DELETE FROM apprentices WHERE id=$id");
    printf ($db, $mysqli->error);
    $_SESSION['message'] = "deleted!";
    header('location: oop-crud.php');
}
