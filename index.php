<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<br>
 <a href="logout.php">Click here</a> to Logout.
 <br>

 <?php include "tableau.php"?>
 