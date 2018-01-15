<?php
  //Registration of a student for a course cancelled
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
  $delete_query="DELETE FROM enroll WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
  $delete_result=mysqli_query($con, $delete_query) or die(mysqli_error($con));
  header('location: course_list.php?sid='.$sid);
?>