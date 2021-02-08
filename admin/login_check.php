<?php

require_once 'oop-login.php';
require_once '../database.class.php';
require_once 'index.php';


$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$login = new Login($username,$password);

$login->login($connection);