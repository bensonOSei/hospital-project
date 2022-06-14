<?php
    include_once 'header.php';

    if(isset($_SESSION["userid"])){
        if($role == "Doctor"){
            header("location: dashboard.php");
            exit();
        }
        else if($role == "Accountant"){
            header("location: dashboard.php");
            exit();
        }
        else if ($role=="Pharmacist") {
            header("location: dashboard.php");
            exit();
        }
        header("location: addpatient.php");
        exit();
    
    }
?>
    <div class="login-main">
        <div class="login">
        <?php
            if(isset($_GET["loggedout"])){
                if($_GET["loggedout"]== "yes"){
                    echo "<p style = 'color: red'>Logged Out</p>";
                }
            }  
        ?>

            <h1 style="text-align: center;">Please Login</h1>
            <form action="includes/login.inc.php" method = "post">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <button type="submit" name = "submit">Login</button>
            </form>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"]== "emptyinput"){
                echo "<p style = 'color: red'>Fill in all fields</p>";
            }
            else if($_GET["error"] == "wrongemail"){
                echo "<p style = 'color: red'>There is no admin with this email. Create account <a href = 'signup.php'>here</a> </p>";
            }
            else if($_GET["error"] == "wrongpassword"){
                echo "<p style = 'color: red'>Password and email does not match</p>";
            }
            else if($_GET["error"] == "loggedout"){
                echo "<p style = 'color: red'>Logged out</p>";
            }
        }
    ?>
            <p>Forgot password? Click <a href="#">here</a></p>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>