<?php

if(isset($_POST["submit"])){
    
    $fname = $_POST["admin_fname"];
    $lname = $_POST["admin_lname"];
    $email = $_POST["admin_email"];
    $phoneNumber = $_POST["admin_phone"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $password_rpt = $_POST["password-rpt"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($fname,$lname,$email,$phoneNumber,$role,$password,$password_rpt) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (invalidPhoneNumber($phoneNumber) !== false) {
        header("location: ../signup.php?error=invalidphonenumber");
        exit();
    }
    if (passwordMatch($password,$password_rpt) !== false) {
        header("location: ../signup.php?error=passwordnotmatching");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailexists");
        exit();
    }
    if (phoneNumberExists($conn, $phoneNumber) !== false) {
        header("location: ../signup.php?error=phonenumberexists");
        exit();
    }

    createUser($conn, $fname,$lname,$email,$phoneNumber,$role,$password);


}

else {
    header("location: ../signup.php");
    exit();
}


?>