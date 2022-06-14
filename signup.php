<?php
    include_once 'header.php';
?>
    <div class="login-main">
        <div class="login">
            <h1 style="text-align: center;">Please Sign Up</h1>

            <form action="includes/signup.inc.php" method = "post">
                <label for="admin_fname">First Name</label>
                <input type="text" name="admin_fname" id="admin_fname" >
                <label for="admin_lname">Last Name</label>
                <input type="text" name="admin_lname" id="admin_lname" >
                <label for="admin_email">Email</label>
                <input type="email" name="admin_email" id="admin_email" >
                <label for="admin_phone">Phone Number</label>
                <input type="text" name="admin_phone" id="admin_phone" >
                <label for="password">Role</label>
                <select name="role" id="role">
                    <option value="--">--</option>
                    <option value="Doctor">Doctor</option>
                    <option value="OPD">OPD</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Pharmacist">Pharmacist</option>
                </select>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <label for="password-rpt">Repeat Password</label>
                <input type="password" name="password-rpt" id="password-rpt">
                <button type="submit" name = "submit">Sign Up</button>
            </form>

            <div style = "padding:5px; margin: 5px; color: red;">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]== "emptyinput"){
                        echo "<p>Fill in all fields</p>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<p>Email is invalid. Choose proper email</p>";
                    }
                    else if($_GET["error"] == "invalidphonenumber"){
                        echo "<p>Phone number is invalid. Choose proper phone number</p>";
                    }
                    else if($_GET["error"] == "passwordnotmatching"){
                        echo "<p>Passwords do not match</p>";
                    }
                    else if($_GET["error"] == "emailexists"){
                        echo "<p>Email is already in use. If email is yours, please login <a href = 'index.php'>here</a> </p>";
                    }
                    else if($_GET["error"] == "phonenumberexists"){
                        echo "<p>Phone Number is already in use. If phone number is yours, please login <a href = 'index.php'>here</a> </p>";
                    }
                    else if($_GET["error"] == "preparestmtfail"){
                        echo "<p>Something went wrong, try again</p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p>You have signed up</p>";
                    }
                }
            ?>
            </div>

            <p>Already an admin? <a href="index.php">Login</a></p>
        </div>

        
    </div>


<?php
    include_once 'footer.php';
?>