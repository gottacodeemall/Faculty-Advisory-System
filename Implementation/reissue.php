<?php
  //Reissue a book
  session_start();
  if ($_SESSION['type']!='Library Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $bid=$_GET['bid'];
  $due=Date('y-m-d', strtotime("+60 days"));
  $update_query="UPDATE check_out SET due_date='$due' WHERE sid='$sid' AND bid='$bid';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: check_script.php?id='.$sid);
?>