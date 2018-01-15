<?php
  //List of students to whom a particular book has been checked out
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
        <h1><?php echo $_GET['id'];?></h1>
        <p style="font-size: 20px;">
        <?php
          require 'connect.php';
          $select_query="SELECT id, name, due_date FROM users, check_out WHERE check_out.bid='".$_GET['id']."' AND users.id=check_out.sid;";
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
                <th><center>Due Date</center></th>
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
                <td><center><?php echo $row['name']?></center></td>
                <td><center><?php echo $row['due_date']?></center></td>
            </tr>
        <?php
           }
        ?>
            </tbody>
        </table>
        <?php
           }
        ?>
        </div>
        </div>
        </div>
   </body>
</html>
