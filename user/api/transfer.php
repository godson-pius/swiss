
<?php

require_once "../../admin/inc/functions/config.php";
$user_id = $_SESSION['user'];

extract($_POST);
$errors = [];
$err_flag = false;

if (!empty($recipent)) {
    $acc_number = sanitize($recipent);
} else {
    $err_flag = true;
    $errors[] = "Enter account number!";
}

if (!empty($acc_name)) {
    $acc_name = sanitize($acc_name);
} else {
    $err_flag = true;
    $errors[] = "Enter account name!";
}

if (!empty($bank_name)) {
    $bank_name = sanitize($bank_name);
} else {
    $err_flag = true;
    $errors[] = "Enter bank name!";
}

if (!empty($swift_code)) {
    $swift_code = sanitize($swift_code);
} else {
    $err_flag = true;
    $errors[] = "Enter swift code!";
}

if (!empty($routing_number)) {
    $routing_number = sanitize($routing_number);
} else {
    $err_flag = true;
    $errors[] = "Enter routing number!";
}

if (!empty($type)) {
    $type = sanitize($type);
} else {
    $err_flag = true;
    $errors[] = "Enter account type!";
}

if (!empty($amount)) {
    $amount = sanitize($amount);
} else {
    $err_flag = true;
    $errors[] = "Enter account number!";
}

if (!empty($desc)) {
    $desc = sanitize($desc);
} else {
    $err_flag = true;
    $errors[] = "Enter description!";
}


if ($err_flag === false) {
    $sql1 = "SELECT * FROM users WHERE id = $user_id";
    $query1 = executeQuery($sql1);

    if ($query1) {
        $details = $query1;
        $total_balance = $details['acc_balance'];
        $email = $details['email'];
        $available_balance = $total_balance - $amount;
        $date = date("Y/m/d");
        $time = date("h:i:sa");
        $username = $details['fullname'];

        if ($amount <= $total_balance) {
            $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, beneficiary, bank_name, swift_code, routing_number, account_type, description, created_at) VALUES ($user_id, 1, $amount, '$acc_number', '$acc_name', '$bank_name', '$swift_code', '$routing_number', '$type', '$desc', now())";
            $query2 = validateQuery($sql2);

            if ($query2) {
                $message = "
                <html lang='en'>
                <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                    <!-- CSS only -->
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                    <title>Title</title>
                </head>
                <body>
                    <div class='container mt-5'>
                        <div class='p-3 bg-info rounded text-center' style='width: 500px;'>
                            <img src='../../media/color-logo.svg' width='50' class='rounded' alt='dd'> <br>
                
                            Dear $username, <br>
                            Your transfer of  $amount was <b>successful</b> <br>
                            <i>Transaction Alert</i> <hr>
                
                            <table class='table table-responsivess table-striped table-hover'>
                                <tr>
                                    <th>Credit/Debit</th>
                                    <td>Debit</td>
                                </tr>
                                <tr>
                                    <th>Account number</th>
                                    <td>$acc_number</td>
                                </tr>
                                <tr>
                                    <th>Date/Time</th>
                                    <td>$date/$time</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>$desc</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>$amount</td>
                                </tr>
                                <tr>
                                    <th>Balance</th>
                                    <td>$total_balance</td>
                                </tr>
                                <tr>
                                    <th>Avalaible Balance</th>
                                    <td>$available_balance</td>
                                </tr>
                            </table>
                            <p class='text-light text-center mt-2'><i>Swiss Apex Financial</i></p>
                        </div>
                
                    </div>
                </body>
                </html>
                ";
                sendEmail($email, "Swiss Apex Financial Alert", $message);
                echo "success";
            }
        } else {
                $message = "
                <html lang='en'>
                <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                    <!-- CSS only -->
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                    <title>Title</title>
                </head>
                <body>
                    <div class='container mt-5'>
                        <div class='p-3 bg-light rounded text-center' style='width: 500px;'>
                            <img src='../../media/color-logo.svg' width='50' class='rounded' alt='dd'> <br>
                
                            Dear $username, <br>
                            Your transaction <b class='text-danger'>failed</b> <br>
                            <i>Details</i> <hr>
                
                            <table class='table table-responsivess table-striped table-hover'>
                                <tr>
                                    <th>Account number</th>
                                    <td>Debit</td>
                                </tr>
                                <tr>
                                    <th>Date/Time</th>
                                    <td>Debit</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>Debit</td>
                                </tr>
                            </table>
                            <p class='text-center mt-2'><i>Swiss Apex Financial</i></p>
                        </div>
                
                    </div>
                </body>
                </html>
                ";
                sendEmail($email, "Swiss Apex Financial Notification", $message);
            $balance_err = "Insufficient Balance";  
            echo $balance_err;
        }
        
    } else {
        $err_user = "Error from getting users";
        echo $err_user;
    }
} else {
    // return $errors;
    echo "failed";
}