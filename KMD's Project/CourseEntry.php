<?php
  include('connection.php');
  include('AutoID_Function.php');
  if(isset($_POST['btnsubmit'])) 
  {
    $CourseID=$_POST['txtCourseID'];
    $CourseName=$_POST['txtCourseName'];

    $check="SELECT * FROM Course
            where CourseName='$CourseName'"; 
    $checkret=mysqli_query($connection,$check);
    $count=mysqli_num_rows($checkret);
        if ($count>0) {
            echo "<script>window.alert('Course Name Already Exist')</script>";
        }
        else
      {
      $insert="INSERT INTO Course
      (CourseID,CourseName)
      VALUES
      ('$CourseID','$CourseName')";
      $insertret=mysqli_query($connection,$insert);
      if($insertret)
      {
        echo "<script>window.alert('Course Entry Completed!')</script>";
        echo "<script>window.location='CourseEntry.php'</script>";
      }
      else
      {
        echo "<p>Error in Course Entry Page:" . mysqli_error($connection)."</p>";
      }      
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Course</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
  <link rel="stylesheet" href="css/admin-style.css">
   <link rel="shortcut icon" href="img/favicon.png" />
 </head>
 <style type="text/css">
     * {
      box-sizing: border-box;
      color:black;
    }
    input[type=text], input[type=password],input[type=mail],input[type=date],select {
    width: 275px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }
    input [type=radio]
    {
         padding: 15px;
         margin: 5px 0 22px 0;
         background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }
.registerbtn {
  background-color:#FF6600;
  color: black;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
  align-items: left;
  border-radius:10px;
 }

  .registerbtn:hover {
  opacity:1;
  }
  .signin {
  background-color: #f1f1f1;
  text-align: center;
  }
</style>
</head>
<body>
     <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="Dashboard.php">           
            <h2><span class="text-primary">A Step </span>Ahead</h2>
        </a>
    </div>
    </nav>
  <div class="container-fluid page-body-wrapper">
     <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      </nav>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="Dashboard.php">
              <span class="menu-title font-weight-bold">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminRegister.php">
              <span class="menu-title font-weight-bold">Manage Admin</span>
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="LecturerEntry.php">
              <span class="menu-title font-weight-bold">Manage Lecturer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff.php">
              <span class="menu-title font-weight-bold">Manage Staff</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CourseEntry.php">
              <span class="menu-title font-weight-bold">Manage Course</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CategoryEntry.php">
              <span class="menu-title font-weight-bold">Manage Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_Class.php" >
              <span class="menu-title font-weight-bold">Manage Class</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="StudentRegister.php">
              <span class="menu-title font-weight-bold">Manage Student</span>
            </a>
          </li>
        </ul>
      </nav>
   <div class="main-panel">
    <div class="content-wrapper">
<form action="CourseEntry.php" method="post">
<fieldset>
<legend>Enter Course:</legend>
<table align="center" cellspacing="3">
      <tr>
       <td>Course ID</td>
       <td>
            <input type="Text" name="txtCourseID" value="<?php echo AutoID('Course','CourseID','CO-','6'); ?>" readonly required/>
       </td>
    </tr>
    <tr>
       <td>Course Name</td>
        <td>
            <input type="text" name="txtCourseName" placeholder="Enter Course Name here" required/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input  class="registerbtn" type="submit" name="btnsubmit"/>
            <input  class="registerbtn" type="reset" value="Clear" class="btn"/>
        </td>
    </tr>
</table>
</fieldset>
<fieldset>
    <legend>Course Information</legend>
      <table>
        <tr>
        <td>
       <?php
          $query="SELECT * FROM Course ORDER BY CourseID";
          $ret=mysqli_query($connection,$query);
          $num_results=mysqli_num_rows($ret);
          if ($num_results==0) {
          echo "<h2>No Record Found</h2>";
          }
          else{
          echo "<table width='100%' cellpadding='8'>";
          echo "<tr>";
          echo "<th algin='left'>Course ID</th>";
          echo "<th algin='left'>Course Name</th>";
                                
          for($i=0;$i<$num_results;$i++)
            {
          $row=mysqli_fetch_array($ret);
          $CourseID=$row["CourseID"];
          echo "<tr>";
          echo "<td>".$row["CourseID"]."</td>";
          echo "<td>".$row["CourseName"]."</td>";
          echo "<td><a href='EditCourse.php?CourseID=$CourseID&Mode=Update'>Edit</a>|<a href='DeleteCourse.php?CourseID=$CourseID'>Delete</a></td>";
          echo "</tr>";
            }
          echo "</table>";     
            }
            ?>
          </td>
        </tr>
     </table>
 </fieldset> 
</form>
 </div>
</div>
</div>
</body>
</html>