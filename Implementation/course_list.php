<?php
  //List of courses for which a student can be registered
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
          $select_query1="SELECT id, name FROM course;";
          $select_result1=mysqli_query($con, $select_query1) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Course Code</center></th>
                <th><center>Name</center></th>
                <th></th>
            </tr>
        <?php
          while($row1=mysqli_fetch_array($select_result1))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row1['id']?></center></td>
                <td><center><?php echo $row1['name']?></center></td>
                <?php
                  $select_query2="SELECT sid, cid, enroll.sem FROM enroll, semester WHERE enroll.sid='".$_GET['sid']."' AND enroll.cid='".$row1['id']."' AND semester.status='curr' AND enroll.sem=semester.sem;";
                  $select_result2=mysqli_query($con, $select_query2) or die(mysqli_error($con));
                  if(mysqli_num_rows($select_result2)==0)
                   {
                ?>
                <td><center><a href="register_script.php?sid=<?php echo $_GET['sid']?>&&cid=<?php echo $row1['id']?>"><button class="btn btn-success">Register</button></a></center></td>
                <?php
                   }
                  else
                   {
                ?>
                <td><center><a href="cancel.php?sid=<?php echo $_GET['sid']?>&&cid=<?php echo $row1['id']?>"><button class="btn btn-danger">Cancel Registration</button></a></center></td>
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
