<?php
  //Backend task for inserting new book details
  session_start();
  if ($_SESSION['type']!='Library Staff')
      {header('location: profile.php');
      }
  require 'connect.php';
  $id=$_POST['id'];
  $title=$_POST['title'];
  $author=$_POST['author'];
  $qty=$_POST['qty'];
  $insert_query="INSERT INTO library_rec VALUES('$id', '$title', '$author', $qty);";
  $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
  header('location: insert_book.php');
?>