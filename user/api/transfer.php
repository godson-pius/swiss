
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

    $rec_sql = "SELECT * FROM users WHERE acc_number = '$acc_number'";
    $rec_result = executeQuery($rec_sql);

    if ($query1) {
        $details = $query1;
        $total_balance = $details['acc_balance'];
        $email = $details['email'];
        $available_balance = $total_balance - $amount;
        $date = date("Y/m/d");
        $time = date("h:i:sa");
        $username = $details['fullname'];

        //Receiver details
        $receiver_email = $rec_result['email'];
        $receiver_fullname = $rec_result['fullname'];

        if ($amount <= $total_balance) {
            $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, beneficiary, bank_name, swift_code, routing_number, account_type, description, created_at) VALUES ($user_id, 1, $amount, '$acc_number', '$acc_name', '$bank_name', '$swift_code', '$routing_number', '$type', '$desc', now())";
            $query2 = validateQuery($sql2);

            if ($query2) {
                $message = "
                <html>
                <head>
                    <title>Title</title>
                </head>
                <body>
                        <div style='background: #452121; padding: 1rem; color: #fff !important; border-radius: 0.25rem!important; width: 500px; text-align: center!important; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; font-family: sans-serif;'>
                            <img src='https://swissapexfinancial.com/media/color-logo.png' width='150' class='rounded' alt='dd'> <br>
                
                            <h2 style='color: #fff !important'>Dear $username,</h2>
                            <h3 style='color: #fff !important'>Your transaction successful!</h3> 
                            <i>Transaction Alert</i> <hr>
                
                            <table style='width: 100%; padding-top: 10px;' border='1'>
                                <tr>
                                    <th style='padding: 7px;'>Credit/Debit</th>
                                    <td>Debit</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Account number</th>
                                    <td>$acc_number</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Date/Time</th>
                                    <td>$date - $time</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Description</th>
                                    <td>$desc</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Amount</th>
                                    <td>USD $amount</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Balance</th>
                                    <td>USD $total_balance</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Avalaible Balance</th>
                                    <td>USD $available_balance</td>
                                </tr>
                            </table>
                            <p style='color: #fff !important'><i>Swiss Apex Financial</i></p>
                        </div>
                
                   
                </body>
                </html>
                ";

                $rec_message = "
                <html>
                <head>
                    <title>Title</title>
                </head>
                <body>
                        <div style='background: #452121; padding: 1rem; color: #fff !important; border-radius: 0.25rem!important; width: 500px; text-align: center!important; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; font-family: sans-serif;'>
                            <img src='https://swissapexfinancial.com/media/color-logo.png' width='150' class='rounded' alt='dd'> <br>
                
                            <h2 style='color: #fff !important'>Dear $receiver_fullname,</h2>
                            <h3 style='color: #fff !important'>You were credited!</h3>  <hr>
                
                            <table style='width: 100%; padding-top: 10px;' border='1'>
                                <tr>
                                    <th style='padding: 7px;'>Credit/Debit</th>
                                    <td>Credit</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>From</th>
                                    <td>$username</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Date/Time</th>
                                    <td>$date - $time</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Description</th>
                                    <td>$desc</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Amount</th>
                                    <td>USD $amount</td>
                                </tr>
                            </table>
                            <p style='color: #fff !important'><i>Swiss Apex Financial</i></p>
                        </div>
                
                   
                </body>
                </html>
                ";
                sendEmail($email, "Swiss Apex Financial Alert", $message);
                sendEmail($receiver_email, "Swiss Apex Financial Alert", $rec_message);
                echo "success";
            }
        } else {
                $message = "
                <html>
                <head>
                    <title>Title</title>
                </head>
                <body>
                   
                        <div style='background: #452121; padding: 1rem; color: #fff !important; border-radius: 0.25rem!important; width: 500px; text-align: center!important; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; font-family: sans-serif;'>
                            <img src='https://swissapexfinancial.com/media/color-logo.png' width='150' class='rounded' alt='dd'> <br>
                
                            <h2 style='color: #fff !important'>Dear $username,</h2>
                            <h3 style='color: #fff !important'>Your transaction failed</h3> 
                            <i>Transaction Alert</i> <hr>
                
                            <table style='width: 100%; padding-top: 10px;' border='1'>
                                <tr>
                                    <th style='padding: 7px;'>Account number</th>
                                    <td>$acc_number</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Date/Time</th>
                                    <td>$date - $time</td>
                                </tr>
                                <tr>
                                    <th style='padding: 7px;'>Amount</th>
                                    <td>USD $amount</td>
                                </tr>
                            </table>
                            <p style='color: #fff !important'><i>Swiss Apex Financial</i></p>
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