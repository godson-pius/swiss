<?php

require_once '../inc/functions/config.php';

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    $sql = "UPDATE users SET access = 1 WHERE id = $id";
    $query = validateQuery($sql);

    if ($query === true) {
        echo "true";
    } else {
        echo "false";
    }
}
