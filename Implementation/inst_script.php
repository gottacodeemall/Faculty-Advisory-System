<?php
  //Backend task for assigning an instructor to a course
  session_start();
  if ($_SESSION['type']!='Admin')
      {header('location: profile.php');
      }
  require 'connect.php';
  $cid=$_GET['cid'];
  $fid=$_GET['fid'];
  $insert_query="INSERT INTO instructor VALUES('$cid', '$fid');";
  $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
  header('location: post_inst.php?cid='.$cid);
?>