<?php
  //Check In a book
  session_start();
  if ($_SESSION['type']!='Library Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $bid=$_GET['bid'];
  $delete_query="DELETE FROM check_out WHERE sid='$sid' AND bid='$bid';";
  $delete_result=mysqli_query($con, $delete_query) or die(mysqli_error($con));
  header('location: check_script.php?id='.$sid);
?>