<?php
ob_start();
@session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username']) ){
header("location:../index.php?msg=Please%20login%20to%20access%20admin%20area%20!&type=error"); 
}
include("../dbconfig.php");
?>





