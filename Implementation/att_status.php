<?php
  //View the attendance status of students registered for a course
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
          $select_query="SELECT users.id AS id, users.name AS name FROM users, enroll, semester WHERE semester.status='curr' AND enroll.sem=semester.sem AND enroll.cid='".$_GET['id']."' AND users.id=enroll.sid;";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          $select_query1="SELECT count(DISTINCT _session) FROM attendance WHERE attendance.cid='".$_GET['id']."';";
          $select_result1=mysqli_query($con, $select_query1) or die(mysqli_error($con));
          $row1=mysqli_fetch_array($select_result1);
          echo "Total number of sessions: ".$row1[0];
        ?>
        </p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Unique Id</center></th>
                <th><center>Name</center></th>
                <th><center>Number of Sessions Attended</center></th>
                <th><center>Attendance Percentage</center></th>
                <th></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {if($row1[0]==0)
             {
         ?>
            <tr>
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
                <td><center>0</center></td>
                <td></td>
                <td></td>
            </tr>
         <?php
              continue;
             }
            $select_query2="SELECT count(*) FROM attendance WHERE attendance.cid='".$_GET['id']."' AND attendance.sid='".$row['id']."' AND attendance.status='P';";
            $select_result2=mysqli_query($con, $select_query2) or die(mysqli_error($con));
            $row2=mysqli_fetch_array($select_result2);
            $percent=$row2[0]*100.0/$row1[0];
            if($percent<75)
                echo "<tr style='background-color: #ff7178;'>";
            else
                echo "<tr>";
        ?>
                <td><center><?php echo $row['id']?></center></td>
                <td><center><?php echo $row['name']?></center></td>
                <center>
                    <?php
                      echo "<td><center>".$row2[0]."</center></td>";
                      echo "<td><center>".$percent."%</center></td>";
                    ?>
                </center>
                <td><center><a href="detailed_att.php?sid=<?php echo $row['id']?>&&cid=<?php echo $_GET['id']?>"><button class='btn btn-primary'>View Detailed Attendance</button></a></center></td>
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
