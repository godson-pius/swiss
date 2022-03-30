

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
        <html lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <!-- CSS only -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
            <title>Message</title>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='p-3 bg-light shadow rounded text-center' style='width: 500px;'>
                    <img src='../../media/color-logo.svg' width='50' class='rounded' alt='dd'> <br>
        
                    Dear $fullname, <br>
                    This is your ONE-TIME-PASSWORD <hr>
        
                    <h1>$otp</h1>
        
                    <p class='text-center mt-2'><i>Swiss Apex Financial</i></p>
                </div>
        
            </div>
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