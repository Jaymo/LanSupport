<?php
/*********************************************************************
    logout.php
**********************************************************************/
require('staff.inc.php');
$_SESSION['_staff']=array();
session_unset();
session_destroy();
@header('Location: login.php');
require('login.php');
?>
