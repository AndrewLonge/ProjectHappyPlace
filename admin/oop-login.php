<?php
require_once("../database.class.php");

class Login {

    private $username;
    private $password; 
    public function __construct($username, $password)
    {
    $this->username = $username;
    $this->password = $password;
    }


    public function login($connection)
    {

        $verifacation = "SELECT username FROM admin WHERE username = '$this->username' AND password = '$this->password';";
        $result = mysqli_query($connection, $verifacation);
        if (mysqli_num_rows($result)) {
            $_SESSION["Admin"]=true;
            header ("location: ../crud/oop-crud.php");
        } else {

            die(mysqli_error($connection) . "Nah fam ur trying too hard init");
        }

    }
}