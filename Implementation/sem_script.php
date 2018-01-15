<?php
  //Backend task for updating current semester
  session_start();
  if ($_SESSION['type']!='Admin')
      {header('location: profile.php');
      }
  require 'connect.php';
  $sem=$_POST['sem'];
  $delete_query="DELETE FROM attendance;";
  $delete_result=mysqli_query($con, $delete_query) or die(mysqli_error($con));
  $select_query="SELECT * FROM semester;";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  if(mysqli_num_rows($select_result)>0)
   {$update_query="UPDATE semester SET sem='$sem';";
    $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
   }
  else
   {$insert_query="INSERT INTO semester VALUES ('$sem', 'curr');";
    $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
   }
  header('location: sem.php');
?>