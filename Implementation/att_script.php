<?php
  //Backend task for attendance
  session_start();
  if ($_SESSION['type']!='Faculty')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $cid=$_GET['cid'];
  $date=$_GET['date'];
  $status=$_GET['act'];
  $session=$_GET['session'];
  $select_query="SELECT * FROM attendance WHERE sid='$sid' AND cid='$cid' AND _session=$session;";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  if(mysqli_num_rows($select_result)>0)
   {$update_query="UPDATE attendance SET _date='$date' WHERE sid='$sid' AND cid='$cid' AND _session=$session;";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
    $update_query="UPDATE attendance SET status='$status' WHERE sid='$sid' AND cid='$cid' AND _session=$session;";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
    header('location: attendance.php?id='.$cid.'&&date='.$date.'&&session='.$session);
   }
  else
  {$insert_query="INSERT INTO attendance VALUES('$sid', '$cid', '$date', $session, '$status');";
   $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
   header('location: attendance.php?id='.$cid.'&&date='.$date.'&&session='.$session);
  }
?>