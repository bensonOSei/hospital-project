<?php 

$serverName = "localhost";
$dBuserName = "root";
$dBpassWord = "";
$dBName = "hospital_db";

$conn = mysqli_connect($serverName,$dBuserName,$dBpassWord,$dBName);

if (!$conn){
    die("Connection failed: ". mysqli_connect_erro());
}
?>