<?php

require_once '../inc/functions/config.php';

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    $sql = "DELETE FROM users WHERE id = $id";
    $query = validateQuery($sql);

    if ($query === true) {

        $sql2 = "DELETE FROM transactions WHERE user_id = $id";
        $query2 = validateQuery($sql2);
        echo "true";
        
    } else {
        echo "false";
    }
}