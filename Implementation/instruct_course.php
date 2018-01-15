<?php
  //List of courses instructed by the logged in faculty member
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
        <div class="col-xs-10 col-xs-offset-1">
        <h3>Following is the list of courses instructed by you:</h3>
        <p style="font-size: 20px;">
        <?php
          require 'connect.php';
          $select_query="SELECT id, name FROM course, instructor WHERE fid='".$_SESSION['user_id']."' AND id=cid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Course Code</center></th>
                <th><center>Name</center></th>
                <th></th>
                <th></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
                <td><center><a href="date.php?id=<?php echo $row['id']?>"><button class="btn btn-primary">Take Attendance</button></a></center></td>
                <td><center><a href="att_status.php?id=<?php echo $row['id']?>"><button class="btn btn-success">View Attendance Status</button></a></center></td>
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
