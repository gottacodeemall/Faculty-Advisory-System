<?php
  //Select semester for which the logged in student would like to view the course details
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
    <h1>COURSE DETAILS</h1>
    <form method="post" action="course_script.php">
        <div class="form-group">
        <select name="sem" placeholder="Semester" class="form-control" required="true">
        <?php
          require 'connect.php';
          $select_query="SELECT DISTINCT sem FROM enroll ORDER BY sem ASC;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($select_result))
           {
          ?>
          <option><?php echo $row['sem']; ?></option>
          <?php
           }
          ?>
          </select>
        </div>
        <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>