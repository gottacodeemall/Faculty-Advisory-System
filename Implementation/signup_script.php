<?php
  //Backend task for sign up
  require 'connect.php';
  session_start();
  $id=$_POST['id'];
  $name=mysqli_real_escape_string($con, $_POST['name']);
  $email=$_POST['email'];
  $password=$_POST['password'];
  $retype=$_POST['retype'];
  if($password!=$retype)
      header('location: index.php?error=PasswordMismatch');
  else
   {$email=mysqli_real_escape_string($con, $email);
    $password=md5($password);
    $contact=mysqli_real_escape_string($con, $_POST['contact']);
    $city=mysqli_real_escape_string($con, $_POST['city']);
    $address=mysqli_real_escape_string($con, $_POST['address']);
    $type=$_POST['type'];
    $select_query="SELECT id FROM users WHERE email = '$email';";
    $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
    if(mysqli_num_rows($select_result)>0)
        header('location: index.php?error=DuplicateEmail');
    else
     {$insert_query="INSERT INTO users VALUES('$id', '$name', '$email', '$password', '$contact', '$city', '$address', '$type', NULL, NULL, NULL);";
      $insert_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
      $_SESSION['user_id']=$id;
      $_SESSION['email']=$email;
      $_SESSION['name']=$name;
      $_SESSION['contact']=$contact;
      $_SESSION['city']=$city;
      $_SESSION['address']=$address;
      $_SESSION['type']=$type;
      header('location: profile.php');
     }
   }
?>