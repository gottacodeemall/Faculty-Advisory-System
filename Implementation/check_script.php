<?php
  //List of books checked out to a particular student
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Library Staff'&&$_SESSION['type']!='Student')
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
        <h1><?php echo $_GET['id'];?></h1>
        <p style="font-size: 20px;">
        <?php
          require 'connect.php';
          $select_query="SELECT id, title, author, due_date FROM library_rec, check_out WHERE check_out.sid='".$_GET['id']."' AND library_rec.id=check_out.bid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          if(mysqli_num_rows($select_result)>0)
           {
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Book Id</center></th>
                <th><center>Title</center></th>
                <th><center>Author</center></th>
                <th><center>Due Date</center></th>
                <?php
                  if($_SESSION['type']=="Library Staff")
                   {
                ?>
                <th></th>
                <th></th>
                <?php
                   }
                ?>
            </tr>
        <?php
          $today="20".date('y-m-d');
          while($row=mysqli_fetch_array($select_result))
           {if(strcmp($row['due_date'], $today)<0)
                   echo "<tr style='background-color: #f99cc9;'>";
            else
                   echo "<tr>";
        ?>
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['title']?></center></td>
                <td><center><?php echo $row['author']?></center></td>
                <td><center><?php echo $row['due_date']?></center></td>
                <?php
                  if($_SESSION['type']=="Library Staff")
                   {
                ?>
                <td><center><a href='check_in.php?sid=<?php echo $_GET['id']?>&&bid=<?php echo $row['id']?>'><button class='btn btn-primary'>Check In</button></a></center></td>
                <td><center><a href='reissue.php?sid=<?php echo $_GET['id']?>&&bid=<?php echo $row['id']?>'><button class='btn btn-success'>Re-Issue</button></a></center></td>
                <?php
                   }
                ?>
            </tr>
        <?php
           }
        ?>
            </tbody>
        </table>
        <?php
           }
          if($_SESSION['type']=="Library Staff")
           {
        ?>
        <div>
            <a href='check_out.php?id=<?php echo $_GET['id']?>'><button class='btn btn-danger'>Check Out</button></a>
        </div>
        <?php
           }
        ?>
        </div>
        </div>
        </div>
   </body>
</html>
