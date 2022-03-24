<?php

require_once '../inc/functions/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM transactions WHERE id = $id";
    $query = validateQuery($sql);

    if ($query === true) {
        echo "true";
    } else {
        echo "false";
    }
}
