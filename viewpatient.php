<?php
include_once 'header.php';

if (!isset($_SESSION["userid"])) {
    header("location: index.php");
}

?>

<div class="patientview" style="height: 100vh">
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
        <tr>
            <?php
            echo "<td>" . $_SESSION["patient_fname"] . "</td>";
            echo "<td>" . $_SESSION["patient_lname"] . "</td>";
            echo "<td>" . $_SESSION["email"] . "</td>";
            echo "<td>" . $_SESSION["patient_address"] . "</td>";
            ?>
        </tr>
    </table>


</div>



<?php
include_once 'footer.php';
?>