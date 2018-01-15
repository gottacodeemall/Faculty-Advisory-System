<?php
  //Profile Page
  session_start();
  if (!isset($_SESSION['email']))
      {header('location: index.php?error=none');
      }
  require 'common.php';
?>
 <body>
   <?php
     require 'header.php';
   ?>
   <div class="container" style="padding-top: 85px; padding-bottom: 85px;">
      <div class="jumbotron">
          <p style="color:#421208; font-size: 30px;">
              <?php
                echo "<b><i>Welcome ".$_SESSION['name']."!!!</i></b>";
              ?>
          </p>
          <p>
              <?php
                echo "<i>Unique Id: ".$_SESSION['user_id']."</i>";
              ?>
          </p>
          <p>
              <?php
                echo "<i>Email: ".$_SESSION['email']."</i>";
              ?>
          </p>
          <p>
              <?php
                echo "<i>Contact: ".$_SESSION['contact']."</i>";
              ?>
          </p>
          <p>
              <?php
                echo "<i>City: ".$_SESSION['city']."</i>";
              ?>
          </p>
          <p>
              <?php
                echo "<i>Address: ".$_SESSION['address']."</i>";
              ?>
          </p>
      </div>
      <ul style="font-size: 25px;">
          <?php
            if($_SESSION['type']=='Faculty')
             {
          ?>
          <li><a href="stud.php">Student List</a></li>
          <li><a href="view.php">Retrieve students registered in a course</a></li>
          <li><a href="instruct_course.php">Take Attendance</a></li>
          <?php
             }
            else if($_SESSION['type']=='Student')
             {
          ?>
          <li><a href="course.php">Course Details</a></li>
          <li><a href="course_att.php">Attendance</a></li>
          <li><a href="grade_card.php">Grade Card</a></li>
          <li><a href="check_script.php?id=<?php echo $_SESSION['user_id']?>">Library Section</a></li>
          <li><a href="my_hostel_dues.php">Hostel Section</a></li>
          <?php
             }
            else if($_SESSION['type']=='Library Staff')
             {
          ?>
          <li><a href="insert_book.php">Insert New Book Details</a></li>
          <li><a href="book_list.php">Update Existing Book Details</a></li>
          <li><a href="check.php">Check Out/Check In</a></li>
          <?php
             }
            else if($_SESSION['type']=='Hostel Staff')
             {
          ?>
          <li><a href="hostel_dues.php">Dues Section</a></li>
          <li><a href="room_allot.php">Room Allotment</a></li>
          <?php
             }
            else
             {
          ?>
          <li><a href="index.php?error=none">Create a New Account</a></li>
          <li><a href="add.php">Add a Course</a></li>
          <li><a href="course_inst.php">View all available courses</a></li>
          <li><a href="sem.php">Update Current Semester</a></li>
          <li><a href="fa.php">Assign a Faculty Advisor</a></li>
          <li><a href="delete_account.php">Delete an Account</a></li>
          <?php
             }
          ?>
      </ul>
   </div>
  </body>
</html>