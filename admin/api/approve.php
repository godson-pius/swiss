<?php

require_once '../inc/functions/config.php';

if (isset($_GET['tid']) && isset($_GET['userid']) && isset($_GET['amount']) && isset($_GET['to'])) {
    $t_id = $_GET['tid'];

    $sql = "UPDATE transactions SET approved = 1 WHERE id = $t_id";
    $query = validateQuery($sql);

    if ($query === true) {

        $id = $_GET['userid'];
        $amount = $_GET['amount'];

        $sql2 = "SELECT * FROM users WHERE id = $id";
        $query2 = executeQuery($sql2);

        if ($query2) {
            $details = $query2;

            $current_bal = $details['acc_balance'];

            $updated_bal = $current_bal - $amount;

            $sql3 = "UPDATE users SET acc_balance = '$updated_bal' WHERE id = $id";
            $query3 = validateQuery($sql3);

            if ($query3 === true) {

                $recipent = $_GET['to'];

                $sql4 = "SELECT * FROM users WHERE acc_number = '$recipent'";
                $query4 = executeQuery($sql4);

                if ($query4) {
                    $recp = $query4;

                    $recp_bal = $recp['acc_balance'];

                    $update_recp = $recp_bal + $amount;

                    $sql5 = "UPDATE users SET acc_balance = '$update_recp' WHERE acc_number = $recipent";
                    $query5 = validateQuery($sql5);

                    if ($query5 === true) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                }
            } 
        }
        

    }
}
