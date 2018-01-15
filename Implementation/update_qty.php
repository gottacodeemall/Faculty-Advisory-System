<?php
  //Update the quantity of a particular book
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Library Staff')
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
    <h1>UPDATE QUANTITY</h1>
    <form method="post" action="update_qty_script.php?id=<?php echo $_GET['id'];?>">
        <div class="form-group">
        <input type="number" name="qty" placeholder="Quantity" class="form-control" required="true">
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