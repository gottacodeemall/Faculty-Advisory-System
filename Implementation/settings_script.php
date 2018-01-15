<?php
  //Backend tasks for changing password
  require 'connect.php';
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?eroor=none');
      } 
  $user_id=$_SESSION['user_id'];
  $old_password=md5($_POST['old_password']);
  $new_password=$_POST['new_password'];
  $retyped_password=$_POST['retype_new_password'];
  if($new_password!=$retyped_password)
      header('location: settings.php?error=Retyped password must be the same as your new password');
  else 
     {$select_query="SELECT pass_word FROM users WHERE id='$user_id'";
      $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
      $row=mysqli_fetch_array($select_result);
      if($old_password!=$row['pass_word'])
          header('location: settings.php?error=Incorrect old password');
      else
          {$new_password=md5($new_password);
           $update_query="UPDATE users SET pass_word='$new_password' WHERE id='$user_id';";
           $update_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
           header('location: settings.php?error=Password successfully updated');
          }
     }
?>