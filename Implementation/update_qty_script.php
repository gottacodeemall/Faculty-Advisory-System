<?php
  //Backend task for updating the quantity of a particular book
  session_start();
  if ($_SESSION['type']!='Library Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_GET['id'];
  $qty=$_POST['qty'];
  $update_query="UPDATE library_rec SET quantity=$qty WHERE id='$id';";
  $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
  header('location: book_list.php');
?>