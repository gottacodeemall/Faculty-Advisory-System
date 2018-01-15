<?php
  //View a detailed record of attendance
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  if ($_SESSION['type']!='Faculty'&&$_SESSION['type']!='Student')
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
          $select_query="SELECT _date, _session, status FROM attendance WHERE attendance.sid='".$_GET['sid']."' AND attendance.cid='".$_GET['cid']."';";
          $select_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
          $select_query2="SELECT count(*) FROM attendance WHERE attendance.sid='".$_GET['sid']."' AND attendance.cid='".$_GET['cid']."' AND attendance.status='P';";
          $select_result2=mysqli_query($con, $select_query2) or die(mysqli_error($con));
          $row2=mysqli_fetch_array($select_result2);
          $tot=mysqli_num_rows($select_result);
          $percent=$row2[0]*100.0/$tot;
          $i=0;
        ?>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th><center>Session</center></th>
                <th><center>Date</center></th>
                <th><center>Status</center></th>
            </tr>
        <?php
          while($row=mysqli_fetch_array($select_result))
           {if($row['status']=='P')
                echo "<tr style='background-color: #5aaa3d'>";
            else
                echo "<tr style='background-color: #ff7178'>";
        ?>
                <td><center><?php echo $row['_session']?></center></td>
                <td><center><?php echo $row['_date']?></center></td>
                <td>
                <center>
                    <?php
                      if($row['status']=='P')
                          echo "Present";
                      else
                          echo "Absent";
                    ?>
                </center>
                </td>
            </tr>
        <?php
           }
        ?>
            </tbody>
        </table>
        <p style="font-size: 20px;">
        <?php
          echo "Total number of sessions: ".$tot."<br>";
          echo "Number of sessions attended: ".$row2[0]."<br>";
          echo "Attendance Percentage: ".$percent."%<br>";
        ?>
        </p>
        </div>
        </div>
        </div>
   </body>
</html>
