<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email,$password) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }


    loginUser($conn,$email,$password);
}
?>