<?php

session_start();
session_destroy();

// Redirect User
header("Location: signin.php");