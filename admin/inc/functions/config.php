<?php
session_start();

// define("HOST", "localhost");
// define("USER", "u264567441_horizon");
// define("PASSWORD", "100%Horizon");
// define("DBNAME", "u264567441_horizon");

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "horizon");

$link = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

require_once "db.php";
require_once "helpers.php";
require_once "actions.php";
require_once "user_func.php";

// define("HOST", "localhost");
// define("USER", "root");
// define("PASSWORD", "");
// define("DBNAME", "chasee");

// $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// require_once "db.php";
// require_once "helpers.php";
// require_once "actions.php";
// require_once "user_func.php";
