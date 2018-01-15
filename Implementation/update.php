<?php
  //Update the marks of a student for a particular course
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Faculty')
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
    <h1>UPDATE GRADE</h1>
    <form method="post" action="update_script.php?sid=<?php echo $_GET['sid']?>&&cid=<?php echo $_GET['cid']?>&&sem=<?php echo $_GET['sem']?>">
        <div class="form-group">
            <input type="float" name="t1" placeholder="Test 1" class="form-control">
        </div>
        <div class="form-group">
            <input type="float" name="t2" placeholder="Test 2" class="form-control">
        </div>
        <div class="form-group">
            <input type="float" name="assignment" placeholder="Assignment" class="form-control">
        </div>
        <div class="form-group">
            <input type="float" name="end_sem" placeholder="End Semester Examination" class="form-control">
        </div>
        <div class="form-group">
            <input type="number" min=1 max=10 name="grade" placeholder="Grade" class="form-control">
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