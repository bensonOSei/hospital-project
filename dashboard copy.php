<?php
    session_start();

    if (!isset($_SESSION["name"])){
        header("location: index.php");
    }
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

        <div class="nav-menu" id="nav">
            <div id="user_picture">
                <div id="pic"></div>
                <div id="user-text">
                    <?php
                        if(isset($_SESSION["name"])){
                            echo "<p>Dr.".$_SESSION["name"]."</p?";
                        }
                    ?>
                </div>
            </div>
            <div class="nav-links">
                <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"> <i class="fas fa-laptop-medical"></i> Patient Queue</a>
                <a href="#"><i class="fas fa-boxes"></i> Drug Inventory</a>
                <a href="#"><i class="fas fa-calendar-week"></i> Calender</a>
                <a href="#"><i class="fas fa-sliders-h"></i> Settings</a>
            </div>
    
            <div class="logout">
                <!--<a href="#" id="min">Minimize</a>-->
                <a href="#">Logout</a>
            </div>

            <div class="close">
                <i id="min" class="fas fa-times"></i>
            </div>



        </div>

        <div class="views">
            <div class="open">
                <i class="fas fa-bars" id="max"></i>
            </div>
        </div>

    
    

    <script src="scripts/index.js"></script>
</body>
</html>