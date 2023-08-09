

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
        $rows = $query2;
        $email = $rows['email'];
        $fullname = $rows['fullname'];

        $sql3 = "INSERT INTO passcodes (otp, user_id) VALUES ($otp, $user_id)";
        $query3 = validateQuery($sql3);

        $message = "
                <html>
                <head>
                    <title>Login</title>
                </head>
                <body>
                    <center>
                    <div style='background: #452121; padding: 1rem; color: #fff !important; border-radius: 0.25rem!important; width: 500px; text-align: center!important; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;'>
                    <img src='https://horizontrustco.com/media/color-logo.png' width='150' style='border-radius: 0.25rem!important' alt='Horizon Trustco'> <br>
            
                        <h2 style='color: #fff !important'>Dear $userName,</h2>
                        <h3 style='color: #fff !important'>This is your ONE-TIME-PASSWORD</h3> <hr>
            
                        <h1 style='font-size: 55px; color: #fff !important'>$otp</h1>

                        <p style='color: #fff !important'>
                            <i>Horizon Trustco</i>
                        </p>
                </div>
                    </center>
                </body>
                </html>
                ";
                sendEmail($email, "Login OTP", $message);
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