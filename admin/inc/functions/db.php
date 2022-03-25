<?php


require_once "config.php";

function validateQuery($statement)
{
    global $link;

    $sql = "$statement";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}

function returnQuery($statement)
{
    global $link;

    $sql = "$statement";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return $query;
    } else {
        return false;
    }

}

function executeQuery($statement)
{
    global $link;

    $sql = "$statement";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return false;
    }
}


function encrypt($password) {
    $initialEncryption = md5($password);
    $finalEncryption = sha1($initialEncryption);

    return $finalEncryption;
}

function decrypt($dbpass, $password) {
    $initialEncryption = md5($password);
    $finalEncryption = sha1($initialEncryption);

    if ($dbpass === $finalEncryption) {
        return true;
    }
}

function fetch($table) {
    $sql = "SELECT * FROM $table ORDER BY id DESC";
    $query = returnQuery($sql);

    if ($query) {
        return $query;
    } else {
        return false;
    }
}

function fetch_transactions($type, $user_id) {
    $sql = "SELECT sum(amount) as total FROM transactions WHERE type = $type AND user_id = $user_id";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function fetch_all_transactions() {
    $sql = "SELECT sum(amount) as total FROM transactions";
    $result = returnQuery($sql);

    if ($result) {
        foreach ($result as $res) {
            return $res['total'];
        }
    } else {
        return false;
    }
}

function fetchAll($table, $preferredOrder = null, $limit1 = null, $limit2 = null) {

    if (!is_null($limit1) && !is_null($limit2) && !is_null($preferredOrder)) {
        $sql = "SELECT * FROM $table ORDER BY $preferredOrder ASC LIMIT $limit1, $limit2";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function fetchAllDesc($table, $preferredOrder = null, $limit1 = null, $limit2 = null) {

    if (!is_null($limit1) && !is_null($limit2) && !is_null($preferredOrder)) {
        $sql = "SELECT * FROM $table ORDER BY $preferredOrder DESC LIMIT $limit1, $limit2";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function fetchAllWhere($table, $where, $whereValue, $orderBy, $limit = null, $limit2 = null) {

    $sql = "SELECT * FROM $table WHERE $where = $whereValue ORDER BY $orderBy DESC LIMIT $limit, $limit2";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function get_transactions($table, $where, $where2, $whereValue, $whereValue2, $orderBy, $limit = null, $limit2 = null) {

    $sql = "SELECT * FROM $table WHERE $where = $whereValue OR $where2 = $whereValue2 ORDER BY $orderBy DESC LIMIT $limit, $limit2";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function where($table, $where, $whereValue, $limit = null) {
    if (!is_null($limit)) {
        $sql = "SELECT * FROM $table WHERE $where = $whereValue LIMIT $limit";
    } else {
        $sql = "SELECT * FROM $table WHERE $where = $whereValue";
    }
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function viewSelectedResult($table, $where, $whereValue, $acad, $term, $limit = null)
{
    if (!is_null($limit)) {
        $sql = "SELECT * FROM $table WHERE $where = $whereValue LIMIT $limit";
    } else {
        $sql = "SELECT * FROM $table WHERE $where = $whereValue AND academic_year_fk = $acad AND term = $term";
    }
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function whereQuote($table, $where, $whereValue, $limit = null) {
    if (!is_null($limit)) {
        $sql = "SELECT * FROM $table WHERE $where = $whereValue LIMIT $limit";
    } else {
        $sql = "SELECT * FROM $table WHERE $where = '$whereValue'";
    }
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function getTotal($table, $optional = null, $optionValue = null) {
    if (!is_null($optional) && !is_null($optionValue)) {
        $sql = "SELECT * FROM $table WHERE $optional = $optionValue";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = returnQuery($sql);

    if ($result) {
        $total = mysqli_num_rows($result);
        return $total;
    } else {
        return false;
    }

}

function getTotalAnd($table, $optional = null, $optionValue = null, $user, $userValue) {
    if (!is_null($optional) && !is_null($optionValue)) {
        $sql = "SELECT * FROM $table WHERE $optional = $optionValue AND $user = $userValue";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = returnQuery($sql);

    if ($result) {
        $total = mysqli_num_rows($result);
        return $total;
    } else {
        return false;
    }

}
function getTotalQuote($table, $optional = null, $optionValue = null) {
    if (!is_null($optional) && !is_null($optionValue)) {
        $sql = "SELECT * FROM $table WHERE $optional = '$optionValue'";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = returnQuery($sql);

    if ($result) {
        $total = mysqli_num_rows($result);
        return $total;
    } else {
        return false;
    }

}

function blockUrlHackers($user, $url) {
    if (!isset($_SESSION[$user])) {
        redirect_to("$url");
    }
}

function checkResultStatus($student_id, $cardPin) {
    $sql = "SELECT * FROM student_cards WHERE student_id_fk = $student_id AND valid = 1 AND card_pin = $cardPin";
    $row = returnQuery($sql);

    if (mysqli_num_rows($row) > 0) {
        redirect_to("view-result");
    }
}

function getAdmin($id) {
    $sql = "SELECT * FROM admins WHERE admin_id = $id";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function selectSearch($field, $whereValue, $input) {

    $sql = "SELECT * FROM $field WHERE $whereValue LIKE '%$input%'";
    $result = returnQuery($sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
    return false;
}

function searchTotal($field, $whereValue, $input) {

    $sql = "SELECT * FROM $field WHERE $whereValue LIKE '%$input%'";
    $result = returnQuery($sql);

    if ($result) {
        $total = mysqli_num_rows($result);
        return $total;
    }
    return false;
}

function check_duplicate($table, $field, $sanitized_value)
{
    $sql = "SELECT * FROM $table WHERE $field = '$sanitized_value'";
    $result = executeQuery($sql);

    if ($result) {
        return true;
    }return false;
}

function check_multiple_result_upload($table, $field, $sanitized_value, $field2, $sanitized_value2, $field3, $sanitized_value3, $field4, $sanitized_value4)
{
    $sql = "SELECT * FROM $table WHERE $field = $sanitized_value AND $field2 = $sanitized_value2 AND $field3 = $sanitized_value3 AND $field4 = $sanitized_value4";
    $result = executeQuery($sql);

    if ($result) {
        return true;
    }return false;
}

// For Deleting Actions..
function delete($table, $field, $id) {

    $sql = $sql = "DELETE FROM `$table` WHERE $field = $id";
    $result = validateQuery($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


function teacherAction($table, $field, $stats, $col, $id)
{
    $sql = $sql = "UPDATE $table SET $field = $stats WHERE $col = $id";
    $result = validateQuery($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function whereQueryWithAnd($table, $field1, $value1, $field2, $value2) {
    $sql = "SELECT * FROM $table WHERE $field1 = $value1 AND $field2 = $value2";
    $result = executeQuery($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}