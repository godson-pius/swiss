
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

if (!empty($type)) {
    $swift_code = sanitize($swift_code);
} else {
    $err_flag = true;
    $errors[] = "Enter swift code!";
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

        if ($amount <= $total_balance) {
            $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, created_at) VALUES ($user_id, 1, $amount, '$acc_number', now())";
            $query2 = validateQuery($sql2);

            if ($query2) {
                $message = "
                <html>
                <head>
                <title>Welcome</title>
                </head>
                <body>
                <div style='padding: 10px; border: 1px 1px 1px solid; border-radius: 10px;'>
                    <p>Hello! \nYour transfer of $amount was successful.\nWe are glad you choose us!</p>
                    <p>Details are as follows:</p>
                </div>
                <table class='table table-bordered table-responsiveness' border='1'>
                <tr>
                <th>Account Number</th>
                <th>Beneficiary Name</th>
                <th>Amount</th>
                </tr>
                <tr>
                <td>$acc_number</td>
                <td>$acc_name</td>
                <td>$amount</td>
                </tr>
                </table>
                <p>
                    <i>Thank you for choosing swiss apex financial</i>
                </p>
                </body>
                </html>
                ";
                sendEmail($email, "SAF Transactions", $message);
                echo "success";
            }
        } else {
            $message = "
                <html>
                <head>
                <title>Welcome</title>
                </head>
                <body>
                <div style='padding: 10px; border: 1px 1px 1px solid; border-radius: 10px;'>
                    <p>Hello! \nYour transfer of $amount failed.\nWe are glad you choose us!</p>
                </div>

                <p>
                    <i>Thank you for choosing swiss apex financial</i>
                </p>
                </body>
                </html>
                ";
                sendEmail($email, "SAF Transactions", $message);
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