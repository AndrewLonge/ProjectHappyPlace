<?php
include_once("../database.class.php");


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != "" && $password != "") {
        $myusername = mysqli_real_escape_string($connection, $_POST['username']);
            $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
            $verifacation = "SELECT username FROM signup WHERE username = '$myusername' AND password = '$mypassword';";
            $result = mysqli_query($connection, $verifacation);
            if (mysqli_num_rows($result)) {
                echo "Acess granted";
                header("Location: ../crud/crud.php");
            } else {
                echo ("this user does not exist");
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../crud/crud.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>