<?php

$result = "";
if(isset($_GET['id']))
{
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    unset($_SESSION['BLOGEDITID']);
    $_SESSION["BLOGEDITID"] = $_GET['id'];
    $result = "111";
}

echo $result;