<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

unset($_SESSION['USERROLE']);
unset($_SESSION['USEREMAIL']);
session_destroy();

header( "Location: ../secret" );
exit();

?>