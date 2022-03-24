<?php

    require_once "../../admin/inc/functions/config.php";

    if (isset($_GET['recipent'])) {
        $recipent = $_GET['recipent'];
    }

    $sql = "SELECT * FROM users WHERE acc_number = $recipent";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        foreach ($query as $name) {
            echo $name['fullname'];
        }
    } else {
        echo "user not found";
    }