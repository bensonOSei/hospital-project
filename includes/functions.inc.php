<?php

//function to validate empty inputs
function emptyInputSignUp($fname, $lname, $email, $phoneNumber, $password, $password_rpt)
{
    $result;
    if (empty($fname) || empty($lname) || empty($email) || empty($phoneNumber) || empty($password) || empty($password_rpt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to validate empty login inputs
function emptyInputLogin($email, $password)
{
    $result;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to validate empty login inputs
function emptyInputnewpatient($firstName, $lastName, $email, $phoneNumber, $address)
{
    $result;
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phoneNumber) || empty($address)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function emptyNewpatient($id)
{
    $result;
    if (empty($id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



//function to validate email
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPhoneNumber($phoneNumber)
{
    $result;
    if (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to validate password match
function passwordMatch($password, $password_rpt)
{
    $result;
    if ($password !== $password_rpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to check if email already exists
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM admins WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=preparestmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;

        return $result;
    }

    mysqli_stmt_close($stmt);
}
function phoneNumberExists($conn, $phoneNumber)
{
    $sql = "SELECT * FROM admins WHERE phoneNumber = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=preparestmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $phoneNumber);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;

        return $result;
    }

    mysqli_stmt_close($stmt);
}
//view patient 
function searchPatient($conn, $id)
{
    $sql = "SELECT * FROM patients WHERE patient_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addpatient.php?error=preparestmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;

        return $result;
    }

    mysqli_stmt_close($stmt);
}

function patientemailExists($conn, $email)
{
    $sql = "SELECT * FROM patients WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=preparestmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;

        return $result;
    }

    mysqli_stmt_close($stmt);
}

//function to create a new user
function createUser($conn, $fname, $lname, $email, $phoneNumber, $role, $password)
{
    $sql = "INSERT INTO  admins (firstName, lastName, email, phoneNumber, admin_password,admin_role) VALUES (?,?,?,?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $phoneNumber, $hashedPassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sessionVar = emailExists($conn, $email);
    session_start();
    $_SESSION["userid"] = $sessionVar["id"];
    $_SESSION["name"] = $sessionVar["firstName"] . " " . $sessionVar["lastName"];
    $_SESSION["role"] = $sessionVar["admin_role"];


    if ($role == "Doctor") {
        header("location: ../dashboard.php");
        exit();
    } else if ($role == "Accountant") {
        header("location: ../dashboard.php");
        exit();
    } else if ($role == "Pharmacist") {
        header("location: ../dashboard.php");
        exit();
    }
    header("location: ../addpatient.php");
    exit();
}

function loginUser($conn, $email, $password)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("location: ../index.php?error=wrongemail");
        exit();
    }

    $passwordHashed = $emailExists["admin_password"];
    $checkpasswd = password_verify($password, $passwordHashed);

    if ($checkpasswd === false) {
        header("location: ../index.php?error=wrongpassword");
        exit();
    } else if ($checkpasswd === true) {
        session_start();
        $_SESSION["userid"] = $emailExists["id"];
        $_SESSION["firstname"] = $emailExists["firstName"];
        $_SESSION["role"] = $emailExists["admin_role"];
        $_SESSION["name"] = $emailExists["firstName"] . " " .  $emailExists["lastName"];

        header("location: ../addpatient.php");
        exit();
    }
}

function addPatient($conn, $firstName, $lastName, $phoneNumber, $address, $email)
{
    $sql = "INSERT INTO patients (patient_fname,patient_lname,patient_pnumber,patient_address,email) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addpatient.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $phoneNumber, $address, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../addpatient.php?error=none");
    exit();
}

function viewPatient($conn, $id)
{
    $session = searchPatient($conn, $id);
    session_start();
    $_SESSION["patient_id"] = $session["patient_id"];
    $_SESSION["patient_fname"] = $session["patient_fname"];
    $_SESSION["patient_lname"] = $session["patient_lname"];
    $_SESSION["patient_pnumber"] = $session["patient_pnumber"];
    $_SESSION["patient_address"] = $session["patient_address"];
    $_SESSION["email"] = $session["email"];


    header("location: ../viewpatient.php");
    exit();
}
