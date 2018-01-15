<?php
  //Redirect page
  header('location: attendance.php?id='.$_GET['id'].'&&date='.$_GET['date'].'&&session='.$_POST['session']);
?>