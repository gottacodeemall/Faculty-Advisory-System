<?php
  //Backend task for login
  require 'connect.php';
  session_start();
  $email=mysqli_real_escape_string($con, $_POST['email']);
  $password=md5($_POST['password']);
  $select_query="SELECT id, email, name, contact, city, address, type FROM users WHERE email = '$email' AND pass_word = '$password';";
  $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
  if(mysqli_num_rows($select_result)==0)
      header('location: index.php?error=SignIn');
  else 
   {$row=mysqli_fetch_array($select_result);
    $_SESSION['user_id']=$row['id'];
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
    $_SESSION['contact']=$row['contact'];
    $_SESSION['city']=$row['city'];
    $_SESSION['address']=$row['address'];
    $_SESSION['type']=$row['type'];
    header('location: profile.php');
   }
?>