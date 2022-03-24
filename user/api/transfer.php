
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

        if ($amount <= $total_balance) {
            $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, created_at) VALUES ($user_id, 1, $amount, '$acc_number', now())";
            $query2 = validateQuery($sql2);

            if ($query2) {
                echo "success";
            }
        } else {
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