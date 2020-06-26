<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['USERROLE']))
{
    if($_SESSION['USERROLE'] != "ADMIN")
    {
        header( "Location: ../secret" );
    }
}