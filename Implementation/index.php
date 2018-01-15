<?php
  //Sign Up Form
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: login.php');
      }
  else if ($_SESSION['type']!='Admin')
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
    <h1>SIGN UP</h1>
    <div style="color: #ff0000;">
        <?php
          if($_GET['error']=='PasswordMismatch')
              echo "<i>*Password Mismatch</i>";
          else if($_GET['error']=='DuplicateEmail')
              echo '<i>*Email Id already Exists</i>';
          else if($_GET['error']=='SignIn')
              echo '<i>*Incorrect E-mail Id or Password</i>';
        ?>
    </div>
    <form method="post" action="signup_script.php">
        <div class="form-group">
        <input type="text" name="id" placeholder="Unique Id" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="name" placeholder="Name" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="email" name="email" placeholder="Email" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="password" name="retype" placeholder="Re-Type Password" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="contact" placeholder="Contact" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="city" placeholder="City" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="address" placeholder="Address" class="form-control" required="true">
        </div>
        <div class="form-group">
            <select name="type" class="form-control" required="true">
                <option>Student</option>
                <option>Faculty</option>
                <option>Library Staff</option>
                <option>Hostel Staff</option>
                <option>Admin</option>
            </select>
        </div>
        <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <!--<p>
        Already have an account? <a href="login.php">Login</a>
    </p>-->
    </div>
    </div>
    </div>
</body>
</html>
