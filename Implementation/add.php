<?php
  //Form for adding a course
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
    <h1>ADD A COURSE</h1>
    <form method="post" action="add_script.php">
        <div class="form-group">
        <div class="form-group">
        <input type="text" name="id" placeholder="Course Code" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="name" placeholder="Course Name" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="submit" value="Add" class="btn btn-primary">
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>