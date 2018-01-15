<?php
  //Grade Card as seen by a student
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
        <?php
          require 'connect.php';
          $select_query="SELECT DISTINCT enroll.sem FROM enroll, semester WHERE NOT(enroll.sem=semester.sem) ORDER BY sem ASC;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($select_result))
           {$select_query2="SELECT id, name, grade FROM course, enroll WHERE enroll.sem='".$row['sem']."' AND enroll.sid='".$_SESSION['user_id']."' AND course.id=enroll.cid;";
            $select_result2=mysqli_query($con, $select_query2) or die(mysqli_error($con));
            if(mysqli_num_rows($select_result2)==0)
                continue;
            echo "<p style='font-size: 20px;'>".$row['sem']."<br></p>";
        ?>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Course Code</center></th>
                <th><center>Name</center></th>
                <th>Grade</th>
            </tr>
        <?php
          while($row2=mysqli_fetch_array($select_result2))
           {
        ?>
            <tr>
                <td><center><?php echo $row2['id']?></center></td>
                <td><center><?php echo $row2['name']?></center></td>
                <td><center><?php echo $row2['grade']?></center></td>
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
