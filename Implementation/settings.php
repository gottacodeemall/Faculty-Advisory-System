<?php
  //Settings Page
  require 'common.php';
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      } 
?>
<body>
    <?php
      include 'header.php';
    ?>
    <div class="container" style="padding-top: 75px; padding-bottom: 250px;">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <h3>Change Password</h3>
                <div>
                    <p class="text-warning">
                        <?php
                          if($_GET['error']!="NULL")
                              echo $_GET['error'];
                        ?>
                    </p>
                </div>
                <form method="post" action="settings_script.php">
                    <div class="form-group">
                    <input type="password" name="old_password" placeholder="Old Password" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                    <input type="password" name="new_password" placeholder="New Password" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                    <input type="password" name="retype_new_password" placeholder="Re-type New Password" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                    <input type="submit" value="Change" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>