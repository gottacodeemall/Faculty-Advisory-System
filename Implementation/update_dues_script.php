<?php
  //Backend task for updating the hostel dues of a particular student
  session_start();
  if ($_SESSION['type']!='Hostel Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_GET['id'];
  $charge=$_POST['charge'];
  if($charge==NULL)
      $charge=0;
  $trans=$_POST['trans'];
  if($trans==NULL)
      $trans=0;
  $increment=$charge-$trans;
  $select_query="SELECT hostel_dues FROM users WHERE id='$id';";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  $row=mysqli_fetch_array($select_result);
  if($row['hostel_dues']==NULL)
      $row['hostel_dues']=0;
  $new_amt=$row['hostel_dues']+$increment;
  $update_query="UPDATE users SET hostel_dues=$new_amt WHERE id='$id';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: hostel_dues.php');
?>