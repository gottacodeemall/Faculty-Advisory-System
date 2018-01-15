<?php
  //Backend task for adding a course
  session_start();
  if ($_SESSION['type']!='Admin')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_POST['id'];
  $name=$_POST['name'];
  $insert_query="INSERT INTO course VALUES ('$id', '$name');";
  $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
  header('location: add.php');
?>