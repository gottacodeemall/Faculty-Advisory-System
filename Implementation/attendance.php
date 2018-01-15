<?php
  //Take attendance of students for a particular course
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
        <p style="font-size: 20px;">
        <?php
          require 'connect.php';
          $select_query="SELECT users.id AS id, users.name AS name FROM users, enroll, semester WHERE enroll.cid='".$_GET['id']."' AND semester.status='curr' AND enroll.sem=semester.sem AND users.id=enroll.sid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Unique Id</center></th>
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
                <td><center><a href='att_script.php?sid=<?php echo $row['id'];?>&&cid=<?php echo $_GET['id'];?>&&date=<?php echo $_GET['date'];?>&&session=<?php echo $_GET['session'];?>&&act=P'><button class='btn btn-success'>Present</button></a></center></td>
                <td><center><a href='att_script.php?sid=<?php echo $row['id'];?>&&cid=<?php echo $_GET['id'];?>&&date=<?php echo $_GET['date'];?>&&session=<?php echo $_GET['session'];?>&&act=A'><button class='btn btn-danger'>Absent</button></a></center></td>
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
