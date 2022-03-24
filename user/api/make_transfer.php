

<?php
require_once "../../admin/inc/functions/config.php";

if (isset($_GET['cott'])) {
    $dcot = $_GET['cott'];

    // Checking for user cot
    $sql1 = "SELECT * FROM users WHERE cot = $dcot";
    $query1 = executeQuery($sql1);

    if ($query1) {
        echo true;
    } else {
        echo false;
    }
}

if (isset($_GET['imff'])) {
    $imf = $_GET['imff'];
    $otp = generateNumber(4);
    $user_id = $_GET['id'];

    // Checking for user cot
    $sql2 = "SELECT * FROM users WHERE imf = $imf";
    $query2 = executeQuery($sql2);

    if ($query2) {

        $sql3 = "INSERT INTO passcodes (otp, user_id) VALUES ($otp, $user_id)";
        $query3 = validateQuery($sql3);
        echo true;
    } else {
        echo false;
    }
}

if (isset($_GET['otpp'])) {
    $otp = $_GET['otpp'];
    $user_id = $_GET['id'];

    // Checking for user cot
    $sql4 = "SELECT * FROM passcodes WHERE otp = $otp AND user_id = $user_id AND status = 'null'";
    $query4 = executeQuery($sql4);

    if ($query4) {

        $sql5 = "UPDATE passcodes SET status = 'used' WHERE otp = $otp AND user_id = $user_id";
        $query5 = validateQuery($sql5);
        echo true;
    } else {
        echo false;
    }
}