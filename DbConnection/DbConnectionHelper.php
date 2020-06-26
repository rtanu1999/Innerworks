<?php

$serverName = "localhost";
$userName = "innerwor_innerwork";
$password = "0703#InnerW@";

try{
    $conn = new PDO("mysql:host=$serverName;dbname=innerwor_innerwork", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Something Went Wrong With Database Please Refresh page & Try Again";
}

?>