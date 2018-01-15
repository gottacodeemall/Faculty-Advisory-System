<?php
  //List of students along with their faculty advisors
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
          $select_query="SELECT id, name, fa FROM users WHERE type='Student';";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Unique Id</center></th>
                <th><center>Name</center></th>
                <th><center>FA Id</center></th>
                <th><center>Faculty Advisor</center></th>
                <th></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
                <?php
                  if($row['fa']==NULL)
                  {
                ?>
                <td></td>
                <td></td>
                <td><center><a href="fac_list.php?sid=<?php echo $row['id']?>"><button class="btn btn-primary">Assign a Faculty Advisor</button></a></center></td>
                <?php
                  }
                 else
                  {$select_query2="SELECT name FROM users WHERE id='".$row['fa']."';";
                   $select_result2=mysqli_query($con, $select_query2) or die(mysqli_error($con));
                   $row2=mysqli_fetch_array($select_result2);
                ?>
                <td><center><?php echo $row['fa']?></center></td>
                <td><center><?php echo $row2['name']?></center></td>
                <td><center><a href="fac_list.php?sid=<?php echo $row['id']?>"><button class="btn btn-success">Update</button></a></center></td>
                <?php
                 }
                ?>
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
