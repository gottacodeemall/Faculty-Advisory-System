<?php
  //Date for which attendance is to be taken
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
    <h3>Enter today's date:</h3>
    <form method="post" action="post_attendance.php?id=<?php echo $_GET['id'];?>&&date=<?php echo "20".date('y-m-d');?>">
        <div class="form-group">
        <input type="number" name="session" placeholder="Session" class="form-control" required="true">
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