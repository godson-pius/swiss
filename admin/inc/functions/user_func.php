<?php
require_once "config.php";


function user_register($post) {
    extract($_POST);
    $errors = [];

    if (!empty($fullname)) {
        $fullname = sanitize($fullname);
    } else {
        $errors[] = "Enter fullname!";
    }
    
    if (!empty($username)) {
        $username = sanitize($username);
    } else {
        $errors[] = "Enter username!";
    }

    if (!empty($phone)) {
        $phone = sanitize($phone);
    } else {
        $errors[] = "Enter phone number!";
    }
    
    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "Enter email!";
    }
    
    if (!empty($address)) {
        $address = sanitize($address);
    } else {
        $errors[] = "Enter address!";
    }
    
    if (!empty($dob)) {
        $dob = sanitize($dob);
    } else {
        $errors[] = "Enter date of birth!";
    }
    
    if (!empty($acc_type)) {
        $acc_type = sanitize($acc_type);
    } else {
        $errors[] = "Enter account type!";
    }
    
    if (!empty($password)) {
        $tmp_password = sanitize($password);
    } else {
        $errors[] = "Enter password!";
    }

    if (!empty($confirm_pwd)) {
        $confirm_pwd = sanitize($confirm_pwd);
    } else {
        $errors[] = "Confirm password!";
    }
    
    if (!isset($terms)) {
        $errors[] = "Confirm password!";
    }

    if ($tmp_password === $confirm_pwd) {
        $password = encrypt($tmp_password);
    } else {
        $errors[] = "Passwords do not match!";
    }


    if (!$errors) {
        // generating account number...
        $account_number = generateNumber(10);
        $account_pin = generateNumber(5);
        $cot = generateNumber(4);
        $imf = generateNumber(4);

        $sql = "INSERT INTO users (fullname, email, username, phone, address, dob, acc_type, acc_number, password, acc_pin, cot, imf, created_at, updated_at) VALUES ('$fullname', '$email', '$username', '$phone', '$address', '$dob', '$acc_type', '$account_number', '$password', '$account_pin', '$cot', '$imf', now(), now())";

        $result = validateQuery($sql);
        if ($result === true) {
            $message = "
                <html>
                <head>
                <title>Welcome</title>
                </head>
                <body>
                <div style='padding: 10px; border: 1px 1px 1px solid; border-radius: 10px;'>
                    <p>Hello! \nWelcome to swissapexfinancial. The bank that serves all customers equally on a daily basis.\nWe are glad you choose us!</p>
                    <p>Your details are as follows:</p>
                </div>
                <table class='table table-bordered table-responsiveness' border='1'>
                <tr>
                <th>Account Number</th>
                <th>Account Pin</th>
                <th>Account Type</th>
                </tr>
                <tr>
                <td>$account_number</td>
                <td>$account_pin</td>
                <td>$acc_type</td>
                </tr>
                </table>
                <p>
                    <i>Thank you for choosing swiss apex financial</i>
                </p>
                </body>
                </html>
                ";
                sendEmail($email, "Welcome to SAF", $message);
            return true;
        } else {
            $errors[] = "Check form inputs";
        }
    } else {
        return $errors;
    }






} // end of user registration

// User Login
function user_login($post)
{
    extract($post);
    $errors = [];

    //Checking for email...
    if (!empty($accNum)) {
        $accNum = sanitize($accNum);
    } else {
        $errors[] = "Please enter your account number!";
    }


    //Checking for password...
    if (!empty($password)) {
        $password = sanitize($password);
    } else {
        $errors[] = "Please enter your password!";
    }


    //The Sql Statement...
    if (!$errors) {
        $sql = "SELECT * FROM users WHERE acc_number = '$accNum'";
        $result = executeQuery($sql);
        if ($result) {
            $encryptedpassword = $result['password'];
            $userEmail = $result['email'];
            $userName = $result['fullname'];
            $user_id = $result['id'];
            $otp = generateNumber(4);
            $message = "
                <html>
                <head>
                <title>Login Verification</title>
                </head>
                <body>
                <div>
                    <p>Dear $userName, Your OTP for swissapexfinancial.com is <b>$otp</b> Use this Passcode to complete your Login. Thank you. Secured by swissapexfinancial</p>
                </div>
                <table>
                <tr>
                <th>Account Number</th>
                <th>Full Name</th>
                </tr>
                <tr>
                <td>$accNum</td>
                <td>$userName</td>
                </tr>
                </table>
                </body>
                </html>
                ";
            if (decrypt($encryptedpassword, $password)) {
                if ($result['access'] == 1) {
                    $_SESSION['tmpData'] = $user_id;
                    if (sendEmail($userEmail, "Login Verification", $message)) {

                        $otpSql = "INSERT INTO passcodes (otp, user_id) VALUES ($otp, $user_id)";
                        $insertOtp = validateQuery($otpSql);

                        if ($insertOtp) {
                            return true;
                        }
                    }   
                } else {
                    $acc_blocked_err = "Your account have been blocked!";
                    return $acc_blocked_err;
                }
                
            }
        }
        $errors[] = "Invalid Login Details!";
    }
    return $errors;
}

function verifyLogin($post) {
    extract($post);
    $errors = [];
    $user_id = $_SESSION['tmpData'];

    if (!empty($otp)) {
        $otp = sanitize($otp);
    } else {
        $errors[] = "Please enter OTP";
    }

    if (!$errors) {
        $sql = "SELECT * FROM passcodes WHERE otp = $otp AND user_id = $user_id AND status = 'null'";
        $result = executeQuery($sql);

        if ($result) {
            $updateSql = "UPDATE passcodes SET status = 'used' WHERE otp = $otp AND user_id = $user_id";
            $updateQuery = validateQuery($updateSql);

            if ($updateQuery) {
                return true;
            }
        } else {
            return "Invaild OTP provided";
        }
    } else {
        return $errors;
    }
}

function confirmPin($post) {
    extract($post);
    $errors = [];
    $user_id = $_SESSION['tmpData'];

    if (!empty($pin)) {
        $pin = sanitize($pin);
    } else {
        $errors[] = "Please provide account pin";
    }

    if (!$errors) {
        $sql = "SELECT * FROM users WHERE acc_pin = $pin AND id = $user_id";
        $result = executeQuery($sql);

        if ($result) {
            $_SESSION['user'] = $user_id;
            return true;
        } else {
            return "Invaild pin provided";
        }
    } else {
        return $errors;
    }
}

function cardLogin($post) {
    extract($post);
    $errors = [];

    if (!empty($username)) {
        $username = sanitize($username);
    } else {
        $errors[] = "Username is empty";
    }

    if (!empty($pin)) {
        $pin = sanitize($pin);
    } else {
        $errors[] = "Pin is empty";
    }

    if (isset($_SESSION['studentId'])) {
        $student_id = $_SESSION['studentId'];
    }

    if (!$errors) {
        $sql = "SELECT * FROM students WHERE id = $student_id";
        $row = executeQuery($sql);

        if ($username === $row['username']) {
            $sql2 = "SELECT * FROM student_cards WHERE card_pin = '$pin'";
            $row2 = executeQuery($sql2);

            if ($row2) {
                $stusentIdFromDb = $row2['student_id_fk'];
                $validStatus = $row2['valid'];

                // echo "<pre>";
                // print_r($row2);
                // echo "<br>student-id: $student_id";
                // echo "<br>valid status: $validStatus";

                // die();

                if ($stusentIdFromDb == $student_id && $validStatus == 1) {
                    $_SESSION['cardSet'] = $row2['card_pin'];
                    return true;
                } else {

                    if(empty($validStatus)){
                        $changeToInvalid = "UPDATE student_cards SET student_id_fk = '$student_id', valid = '1' WHERE card_pin = '$pin'";
                        $invalidQuery = validateQuery($changeToInvalid);

                        if ($invalidQuery) {
                            $_SESSION['cardSet'] = $row2['card_pin'];
                            return true;
                        } else {
                            $invalid = "Invalid card details";
                            return $invalid;
                        }
                    }else{
                        $invalid = "This card does not belong to you! Please check for your card";
                        return $invalid;
                    }

                }
            } else {
                $invalid = "Invalid card details";
                return $invalid;
            }
            
        } else {
            $invalid = "Invalid card details";
            return $invalid;
        }
    } else {
        return $errors;
    }
}

function updateStudentProfile($post)
{
    extract($post);
    $errors = [];

    $studentId = $id;

    if (!empty($fullname)) {
        $fullname = sanitize($fullname);
    } else {
        $errors[] = "Name cannot be empty!";
    }

    if (!empty($oldpassword)) {
        $oldpassword = sanitize($oldpassword);

        $sql = "SELECT * FROM students WHERE id = $studentId";
        $gettingDetails = executeQuery($sql);
        if (!empty($gettingDetails)) {
            $db_pwd = $gettingDetails['password'];
            $check_pwd = decrypt($db_pwd, $oldpassword);
            if ($check_pwd === true) {
                if (!empty($newpassword)) {
                    $new_pwd_tmp = sanitize($newpassword);
                    $new_pwd = encrypt($new_pwd_tmp);

                    $update_pwd = "UPDATE students SET password = '$new_pwd' WHERE id = $studentId";
                    $update_pwd_query = validateQuery($update_pwd);
                }
            } else {
                $errors[] = "Incorrect Password";
            }
        }
    }

    if (isset($_FILES['pics'])) {
        $pics = sanitize($_FILES['pics']['name']);
        $tmp_pics = $_FILES['pics']['tmp_name'];
        move_uploaded_file($tmp_pics, "../assets/images/students/$pics");
    } else {
        $errors[] = "Profile Image is empty" . "<br>";
    }

    if (!$errors) {
        $update_profile = "UPDATE students SET name = '$fullname', image = '$pics' WHERE id = $studentId";
        $profile_query = validateQuery($update_profile);

        if ($profile_query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function make_transfer($post, $user_id) {
    extract($post);
    $errors = [];
    $err_flag = false;

    if (!empty($recipent)) {
        $acc_number = sanitize($recipent);
    } else {
        $err_flag = true;
        $errors[] = "Enter account number!";
    }
    
    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Enter account number!";
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
                    return true;
                }
            } else {
                $balance_err = "Insufficient Balance";
                return $balance_err;
            }
        } else {
            $err_user = "Error from getting users";
            return $err_user;
        }
    } else {
        return $errors;
    }
}

function wire_transfer($post, $user_id) {
    extract($post);
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
                    return true;
                }
            } else {
                $balance_err = "Insufficient Balance";  
                return $balance_err;
            }
            
        } else {
            $err_user = "Error from getting users";
            return $err_user;
        }
    } else {
        return $errors;
    }
}

function Test() {
    
}


function credit_account($post, $user_id) {
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Amount is empty";
    }

    if ($err_flag === false) {
        $ql = "SELECT * FROM users WHERE id = $user_id";
        $qq = executeQuery($ql);

        if ($qq) {
            $details = $qq;
            $amount_in_db = $details['acc_balance'];
            $acc_number = $details['acc_number'];

            $update_balance = $amount + $amount_in_db;

            $sql = "UPDATE USERS SET acc_balance = '$update_balance' WHERE id = $user_id";
            $result = validateQuery($sql);

            if ($result) {
                $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, approved, created_at) VALUES ($user_id, 0, $amount, $acc_number, 1, now())";
                $query2 = validateQuery($sql2);

                if ($query2) {
                    return true;
                } else {
                    $err = "Error! try again";
                }
            } 
        }
    } else {
        return $errors;
    }
}

function Transactions($user_id, $status) {
    $sql = "SELECT * FROM transactions WHERE user_id = $user_id AND approved = $status ORDER BY id DESC";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}