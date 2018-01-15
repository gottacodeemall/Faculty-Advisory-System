<?php
  //Update the room alloted to a particular student
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Hostel Staff')
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
    <h1>UPDATE ROOM</h1>
    <form method="post" action="update_room_script.php?id=<?php echo $_GET['id'];?>">
        <div class="form-group">
        <input type="text" name="room" placeholder="Room Alloted" class="form-control" required='true'>
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