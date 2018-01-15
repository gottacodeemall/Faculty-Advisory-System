<?php
  ////Backend task for logout
  session_start();
  if(!isset($_SESSION['email']))
      header('location:index.php?error=none');
  else
  {session_destroy();
   header('location:index.php?error=none');
  }
?>