<?php
  //Hostel Dues of logged in student
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Student')
      {header('location: profile.php');
      }
  require 'common.php';
?>
 <body>
   <?php
     require 'header.php';
   ?>
    <div class="container" style="padding-top: 85px; padding-bottom: 85px;">
    <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
    <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Hostel Dues</center></th>
                <th><center>Room</center></th>
            </tr>
    <tr>
    <?php
      require 'connect.php';
      $select_query="SELECT hostel_dues, room FROM users WHERE id='".$_SESSION['user_id']."';";
      $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
      $row=mysqli_fetch_array($select_result);
      if($row['hostel_dues']==NULL)
          $row['hostel_dues']=0;
      if($row['room']==NULL)
          $row['room']="NA";
      echo "<td><center>".$row['hostel_dues']."</center></td>";
      echo "<td><center>".$row['room']."</center></td>";
    ?>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
</body>
</html>