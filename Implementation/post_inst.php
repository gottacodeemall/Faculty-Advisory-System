<?php
  //List of instructors for a course
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Admin')
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
          $select_query="SELECT id, name FROM users, instructor WHERE cid='".$_GET['cid']."' AND id=fid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          if(mysqli_num_rows($select_result)>0)
           {
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Unique Id</center></th>
                <th><center>Name</center></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
            </tr>
        <?php
           }
        ?>
            </tbody>
        </table>
        <?php
           }
        ?>
        <a href="inst.php?cid=<?php echo $_GET['cid']?>"><button class='btn btn-primary'>Add an instructor</button></a>
        </div>
        </div>
        </div>
   </body>
</html>
