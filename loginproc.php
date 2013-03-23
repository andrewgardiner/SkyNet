<?php

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}
$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password)
{
$connect = mysql_connect("localhost", "root", "") or die ("couldnt connect");
   mysql_select_db("jdvsd2") or die ("couldnt find the db");
   
   $query = mysql_query("SELECT * FROM employees WHERE username = '$username'");
   
   $numrows = mysql_num_rows($query);
   mysql_error();
   
   if ($numrows == 0) {
      echo 'that username doesnt exist';
   }
   
   if ($numrows != 0) {
      //code to log in
      while ($row = mysql_fetch_assoc($query)) {
         $db_username = $row['username'];
         $db_password = $row['password'];
      }
      //check to see if they match;
      if ($username == $db_username && $password == $db_password) {
         echo  $_SESSION['username']=$username;
	  }
      }else{
         echo 'Incorrect password';
      }
   }



?>



