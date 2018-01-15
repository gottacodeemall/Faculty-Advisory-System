<?php
  //Backend task for updating the marks of a student for a particular course
  session_start();
  if ($_SESSION['type']!='Faculty')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sid=$_GET['sid'];
  $cid=$_GET['cid'];
  $sem=$_GET['sem'];
  $t1=$_POST['t1'];
  $t2=$_POST['t2'];
  $assignment=$_POST['assignment'];
  $end_sem=$_POST['end_sem'];
  $grade=$_POST['grade'];
  if($t1!=NULL)
   {$update_query="UPDATE enroll SET t1=$t1 WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  if($t2!=NULL)
   {$update_query="UPDATE enroll SET t2=$t2 WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  if($assignment!=NULL)
   {$update_query="UPDATE enroll SET assignment=$assignment WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  if($end_sem!=NULL)
   {$update_query="UPDATE enroll SET end_sem=$end_sem WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  if($grade!=NULL)
   {$update_query="UPDATE enroll SET grade=$grade WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  $select_query="SELECT t1, t2, assignment, end_sem FROM enroll WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  $row=mysqli_fetch_array($select_result);
  $total=$row['t1']+$row['t2']+$row['assignment']+$row['end_sem'];
  $update_query="UPDATE enroll SET total=$total WHERE sid='$sid' AND cid='$cid' AND sem='$sem';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: view_script.php?cid='.$cid);
?>