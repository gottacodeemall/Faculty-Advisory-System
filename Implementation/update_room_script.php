<?php
  //Backend task for updating the room alloted to a particular student
  session_start();
  if ($_SESSION['type']!='Hostel Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_GET['id'];
  $room=$_POST['room'];
  $update_query="UPDATE users SET room='$room' WHERE id='$id';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: room_allot.php');
?>