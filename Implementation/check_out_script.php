<?php
  //Backend tasks for checking out a book to a particular student
  session_start();
  if ($_SESSION['type']!='Library Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $bid=$_GET['bid'];
  $due=Date('y-m-d', strtotime("+60 days"));
  $insert_query="INSERT INTO check_out VALUES('$sid', '$bid', '$due');";
  $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
  header('location: check_script.php?id='.$sid);
?>