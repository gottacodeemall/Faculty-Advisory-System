<?php
  //Course details for a particular semester as seen by a student
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Student')
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
          $select_query="SELECT course.id AS id, course.name AS name, t1, t2, assignment, end_sem, total, grade FROM course, enroll WHERE enroll.sid='".$_SESSION['user_id']."' AND enroll.sem='".$_POST['sem']."' AND course.id=enroll.cid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Course Code</center></th>
                <th><center>Name</center></th>
                <th><center>Test 1</center></th>
                <th><center>Test 2</center></th>
                <th><center>Assignment</center></th>
                <th><center>End Semester Examination</center></th>
                <th><center>Total</center></th>
                <th><center>Grade</center></th>
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
