<?php
  //Backend tasks for deleting an account
  session_start();
  if ($_SESSION['type']!='Admin')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_GET['id'];
  $delete_query="DELETE FROM enroll WHERE sid='$id';";
  $delete_result=mysqli_query($con, $delete_query) or die(mysqli_error($con));
  $delete_query="DELETE FROM users WHERE id='$id';";
  $delete_result=mysqli_query($con, $delete_query) or die(mysqli_error($con));
  header('location: delete_account.php');
?>