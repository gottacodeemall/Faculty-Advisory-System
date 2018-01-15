<?php
  //Student registered for a course
  session_start();
  if ($_SESSION['type']!='Faculty')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $cid=$_GET['cid'];
  $select_query="SELECT sem FROM semester WHERE status='curr';";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  $row=mysqli_fetch_array($select_result);
  $sem=$row['sem'];
  $insert_query="INSERT INTO enroll VALUES ('$sid', '$cid', '$sem', 0, 0, 0, 0, 0, 0);";
  $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
  header('location: course_list.php?sid='.$sid);
?>