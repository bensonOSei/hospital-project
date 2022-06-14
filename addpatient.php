<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';


    if(!isset($_SESSION["userid"])){
        header("location: index.php");
    }
?>
    <div class="patient-log">
        <div class="new-patient-form">
            <h2>Add New Patient</h2>
            <form action="includes/newpatient.inc.php" method = "post">
                <label for="fname">First Name*</label>
                <input type="text" name="fname" id="fname" >
                <label for="lname">Last Name*</label>
                <input type="text" name="lname" id="lname" >
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="pnumber">Phone Number*</label>
                <input type="text" name="pnumber" id="pnumber" >
                <label for="address">Address*</label>
                <input type="text" name="address" id="address" >

                <button type = "submit" name = "submit">Add Patient</button>
            </form>
        </div>
        <div style = "padding:5px; margin: 5px; color: red;">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]== "emptyinput"){
                        echo "<p>Fill in all fields</p>";
                    }
                    else if($_GET["error"] == "emailexists"){
                        echo "<p>Patient Email already exists</p>";
                    }
                    else if($_GET["error"] == "preparestmtfail"){
                        echo "<p>Something went wrong, try again</p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p>Patient added</p>";
                    }
                    else if($_GET["error"] == "newpatientfielempty"){
                        echo "<p>New pateint inputs must not be empty</p>";
                    }
                }
            ?>
        </div>


        <div class="old-patient">
            <p>If patient is not new, click below</p>
            <a href = "#new" onclick="newPatient()">Old Patient</a>

        </div>
    </div>
    <div class="patient-login" id="login">
        <form action="includes/findpatient.inc.php" method = "post">
            <label for="id">Pateint ID</label>
            <input type="text" name="id" id="id" placeholder="Enter Patient Card Id">

            <button type = "submit" name = "submit">Search</button>
            <button type = "button" id="cancel">Cancel</button>
        </form>
    </div>

    <div class="counts">
        <div>
            <div class="number">
                <p>35</p>
            </div>
            <p id="text">Patients Today </p>
        </div>
        <div>
            <div class="number">
                <?php
                    $sql = "SELECT COUNT(patient_id) AS patient_number FROM patients;";
                    $result = mysqli_query($conn,$sql);

                    $row = mysqli_fetch_assoc($result);
                    echo "<p>" . $row["patient_number"]. "</p>" ;

                
                ?>
            </div>
            <p id="text">Patients In Total</p>
        </div>
    </div>


<?php
    include_once 'footer.php';
?>