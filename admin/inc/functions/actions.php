<?php
require_once "config.php";

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function adminLogin($post)
{
    extract($post);
    $errors = [];

    //Checking for email...
    if (!empty($email)) {
        $tmpEmail = sanitize($email);

        if ($tmpEmail) {
            $mail = $tmpEmail;
        } else {
            $errors[] = "Invalid email address!";
        }
    } else {
        $errors[] = "Please enter your email address!";
    }


    //Checking for password...
    if (!empty($password)) {
        $password = sanitize($password);
    }else {
        $errors[] = "Please enter your password!";
    }


    //The Sql Statement...
    if (!$errors) {
        $sql = "SELECT * FROM admins WHERE email = '$mail'";
        $result = executeQuery($sql);
        if ($result) {
            $encryptedpassword = $result['password'];
            if (decrypt($encryptedpassword, $password)) {
                $_SESSION['admin'] = $result['id'];
                    // if (isset($rememberMe)) {
                    //     setcookie("admin_password", $password, time() + (86400 * 30), "/");
                    //     setcookie("admin_email", $mail, time() + (86400 * 30), "/");
                    // }
                return true;
            }
        }
        $errors[] = "Invalid Login Details!";
    }
    return $errors;

}


function AddAdmin($post) {
    extract($post);
    $errors = [];


    if (!empty($name)) {
        $name = sanitize($name);
    }else {
        $errors[] = "Admin name is empty!"  . "<br>";
    }


    //Checking for email...
    if (!empty($email)) {
        $tmpEmail = sanitize($email);

        if ($tmpEmail) {
            $mail = $tmpEmail;
        } else {
            $errors[] = "Invalid email address!"  . "<br>";
        }
    } else {
        $errors[] = "Admin email address is empty!"  . "<br>";
    }


    //Checking for password...
    if (!empty($password)) {
        $tmp_password = sanitize($password);
        $password = encrypt($tmp_password);
    }else {
        $errors[] = "Enter preferred password!"  . "<br>";
    }

    if (!$errors) {
        $sql = "INSERT INTO admins (name, email, password) VALUES ('$name', '$mail', '$password')";

        $result = validateQuery($sql);
        if ($result) {
            return true;
        } else {
            $errors[] = "Operation Failed! Try Again" . "<br>";
        }
    } else {
        return $errors;
    }
}


function credit_user_account($post) {
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($recipent)) {
        $acc_number = sanitize($recipent);
    } else {
        $errors[] = "Enter account number!";
    }

    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Amount is empty";
    }

    if ($err_flag === false) {
        $ql = "SELECT * FROM users WHERE acc_number = $acc_number";
        $qq = returnQuery($ql);

        if (mysqli_num_rows($qq) > 0) {
            $details = mysqli_fetch_assoc($qq);
            $amount_in_db = $details['acc_balance'];
            $userId = $details['id'];

            $update_balance = $amount + $amount_in_db;

            $sql = "UPDATE users SET acc_balance = '$update_balance' WHERE acc_number = $acc_number";
            $result = validateQuery($sql);

            if ($result) {
                $insertTrans = "INSERT INTO transactions (user_id, type, amount, to_user, approved, created_at) VALUES ($userId, 0, $amount, '$acc_number', 1, now())";
                $insertQuery = validateQuery($insertTrans);

                if ($insertQuery) {
                    return true;
                } else {
                    $err = "Error! trying again";
                }

                // return true;
            } else {
                $err = "Error! try again";
                return $err;
            }
        }
    } else {
        return $errors;
    }
}

function setPassword($post, $id) {
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($password)) {
        $tmp_password = sanitize($password);
        $password = encrypt($tmp_password);
    } else {
        $err_flag = true;
        $errors[] = "Type in your new password!";
    }

    if ($err_flag === false) {
        $sql = "UPDATE admins SET password = '$password' WHERE id = $id";
        $query = validateQuery($sql);

        if ($query) {
            return true;
        } else {
            $errors[] = "Error! Please Try Again";
        }
    } else {
        return $errors;
    }
}


function backdate($post, $trans_id) {
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($date)) {
        $tmp_date = sanitize($date);
        $current_time = date("H:i:s");
        $date = $tmp_date . " " . $current_time;
    } else {
        $err_flag = true;
        $errors[] = "Please put a date!";
    }

    if ($err_flag === false) {
        $sql = "UPDATE transactions SET created_at = '$date' WHERE id = $trans_id";
        $query = validateQuery($sql);

        if ($query) {
            return true;
        } else {
            $errors[] = "Error! Please Try Again";
        }
    } else {
        return $errors;
    }
}

function replyTicket($post, $ticket_id) {
    extract($post);
    $errors = [];

    if (!empty($reply)) {
        $reply = ALLOW_SAFE_SYMBOLS(sanitize($reply));
    } else {
        $errors[] = "Please add a reply message";
    }

    if (!$errors) {
        $sql = "UPDATE tickets SET reply = '$reply', status = 1, updated_at = now() WHERE ticket_id = $ticket_id";
        $result = validateQuery($sql);

        if ($result) {
            return true;
        } else {
            return "Please try again";
        }
    } else {
        return $errors;
    }
}