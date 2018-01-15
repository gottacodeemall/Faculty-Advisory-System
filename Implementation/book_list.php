<?php
  //List of books available in library
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
        <div class="col-xs-10 col-xs-offset-1">
        <p style="font-size: 20px;">
        <?php
          require 'connect.php';
          $select_query="SELECT library_rec.*, count(sid) FROM library_rec LEFT JOIN check_out ON id=bid GROUP BY id;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Book Id</center></th>
                <th><center>Title</center></th>
                <th><center>Author</center></th>
                <th><center>Quantity</center></th>
                <th><center>Checked Out</center></th>
                <th><center>Available</center></th>
                <th></th>
                <th></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['title']?></center></td>
                <td><center><?php echo $row['author']?></center></td>
                <td><center><?php echo $row['quantity']?></center></td>
                <td><center><?php echo $row['count(sid)']?></center></td>
                <td><center><?php echo $row['quantity']-$row['count(sid)']?></center></td>
                <td><center><a href="update_qty.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">Update Quantity</button></a></center></td>
                <td><center><a href="view_check_out.php?id=<?php echo $row['id'];?>"><button class="btn btn-danger">View Check Outs</button></a></center></td>
            </tr>
        <?php
           }
        ?>
            </tbody>
        </table>
        </div>
        </div>
        </div>
   </body>
</html>
