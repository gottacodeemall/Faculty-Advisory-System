<?php
  //View details of students registered for a course
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
          $select_query="SELECT sem FROM semester WHERE status='curr';";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          $row=mysqli_fetch_array($select_result);
          $sem=$row['sem'];
          $select_query="SELECT users.id AS id, users.name AS name, fa, t1, t2, assignment, end_sem, total, grade FROM users, enroll WHERE enroll.cid='".$_GET['cid']."' AND enroll.sem='".$sem."' AND users.id=enroll.sid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Unique Id</center></th>
                <th><center>Name</center></th>
                <th><center>Test 1</center></th>
                <th><center>Test 2</center></th>
                <th><center>Assignment</center></th>
                <th><center>End Semester Examination</center></th>
                <th><center>Total</center></th>
                <th><center>Grade</center></th>
                <th></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {
        ?>
            <tr class="table table-striped">
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
                <td><center><?php echo $row['t1']?></center></td>
                <td><center><?php echo $row['t2']?></center></td>
                <td><center><?php echo $row['assignment']?></center></td>
                <td><center><?php echo $row['end_sem']?></center></td>
                <td><center><?php echo $row['total']?></center></td>
                <td>
                <center>
                    <?php
                      if($row['grade']!=0)
                       {echo $row['grade'];
                       }
                      else
                       {echo "NA";
                       }
                    ?>
                </center>
                </td>
                <td><center><?php echo "<a href='update.php?sid=".$row['id']."&&cid=".$_GET['cid']."&&sem=".$sem."'>";?><button class="btn btn-primary">Update Marks</button></a></center></td>
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
