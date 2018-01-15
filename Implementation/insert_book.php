<?php
  //Form to enter new book details
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
    <h1>INSERT DETAILS</h1>
    <form method="post" action="insert_book_script.php">
        <div class="form-group">
        <input type="text" name="id" placeholder="Book Id" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="title" placeholder="Title" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="text" name="author" placeholder="Author" class="form-control" required="true">
        </div>
        <div class="form-group">
        <input type="number" name="qty" placeholder="Quantity" class="form-control" required="true">
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