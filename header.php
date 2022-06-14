<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/6db44154cb.js" crossorigin="anonymous"></script>
    <title>Hospital Manager</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <h1>Hospital Manager</h1>
        </div>

        <div class="search-bar">
            <?php
                if (isset($_SESSION["userid"])) {
                    echo "<a href='dashboard.php'>Dashboard</a>";
                    echo "<a href='includes/logout.inc.php'>Sign Out</a>";
                }
                else {
                    echo "<a href='signup.php'>Sign Up</a>";
                }
            ?>
            
        </div>
    </header>
