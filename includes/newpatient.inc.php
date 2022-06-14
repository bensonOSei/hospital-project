<?php
    if (isset($_POST["submit"])) {
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["pnumber"];
        $address = $_POST["address"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
    
        if(emptyInputnewpatient($firstName,$lastName,$email,$phoneNumber,$address) !== false){
            header("location: ../addpatient.php?error=emptyinput");
            exit();
        }

        if(patientemailExists($conn, $email)){
            header("location:../addpatient.php?error=emailexists");
            exit();
        }

        addPatient($conn,$firstName,$lastName,$phoneNumber,$address,$email);
    }
?>