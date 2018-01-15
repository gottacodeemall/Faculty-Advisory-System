<?php
  //Form to update current semester
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Admin')
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
    <h1>UPDATE CURRENT SEMESTER</h1>
    <div style="font-size: 20px; padding-bottom: 3%; ">
    <?php
      require 'connect.php';
      $select_query="SELECT sem FROM semester WHERE status='curr'";
      $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
      if($row=mysqli_fetch_array($select_result))
       {echo "Current Semester: ".$row['sem'];
       }
    ?>
    </div>
    <form method="post" action="sem_script.php">
        <div class="form-group">
            <input type="text" name="sem" placeholder="Update Current Semester" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>