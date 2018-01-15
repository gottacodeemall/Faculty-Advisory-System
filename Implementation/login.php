<?php
  //Login Form
  require 'common.php';
  session_start();
  if (isset($_SESSION['email']))
      {header('location: profile.php');
      } 
?>
<body>
    <?php
      include 'header.php';
    ?>
    <div class="container" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <p class="text-warning">Login to your DSS account</p>
                        <form method="post" action="login_submit.php">
                            <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" placeholder="E-Mail" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <!--<p>Don't have an account? <a href="index.php?error=none">Register</a> </p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>