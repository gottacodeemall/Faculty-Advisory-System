<?php
  //Backend task for assigning a faculty memeber as a faculty advisor for a student
  session_start();
  if ($_SESSION['type']!='Admin')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $fid=$_GET['fid'];
  $update_query="UPDATE users SET fa='$fid' WHERE id='$sid';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: fa.php');
?>