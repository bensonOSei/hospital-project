<?php
    if(isset($_POST["submit"])){
        $id = $_POST["id"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyNewpatient($id) !== false){
            header("location: ../addpatient.php?error=newpatientfielempty");
            exit();
        }
        if(searchPatient($conn,$id) == false){
            header("location: ../addpatient.php?error");
            exit();
        } 

        viewPatient($conn,$id);
    
    }