<?php 
    include('Connection.php');
    if (isset($_POST['btnupdate'])) {
        $Classid=$_POST['txtClassID'];
        $Category=$_POST['txtcategory'];
        $Coursename=$_POST['txtcoursename'];
        $Lecturer=$_POST['txtlecturer'];
        $StartDate=$_POST['txtStartDate'];
        $EndDate=$_POST['txtEndDate'];
        $Time=$_POST['txtTime'];
        $ETime=$_POST['txtETime'];
        $Fees=$_POST['txtFees'];
        $Seats=$_POST['txtSeats'];
        $image=$_FILES['txtpath']['name'];
        $folder="Images/";
        if($image)
        {
         $filename=$folder.$Classid."_".$image;
         $copied=copy($_FILES['txtpath']['tmp_name'],$filename);
         if(!$copied)
          {
            exit("Problem occured.");
          }
        }
        $Update="UPDATE Class SET 
                 CourseName='$Coursename',
                 StartDate='$StartDate',
                 EndDate='$EndDate',
                 Time='$Time',
                 ETime='$ETime',
                 Lecturer='$Lecturer',
                 Fees='$Fees',
                 Category='$Category',
                 Seats='$Seats'
                 WHERE ClassID='$Classid'";
        $result=mysqli_query($connection,$Update);
        if(($startdates<date('Y-m-d'))or ($startdates>=$enddate))
        {
            echo "<script>window.alert('Please Enter Correct Date');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
        }
        elseif ($result) {
            echo "<script>window.alert('Class Update Successful');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
        }
        else{
            echo "<script>window.alert('Class Record Cannot Update');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
        }
    }
    if (isset($_REQUEST['ClassID'])) {
        $ClassID=$_REQUEST['ClassID'];
        $query="SELECT * FROM Class WHERE ClassID='$ClassID'";
        $ret=mysqli_query($connection,$query);
        $arr=mysqli_fetch_array($ret);
    }
    else{
        echo "<script>window.alert('Please Choose Class ID.');</script>";
        echo "<script>window.location='Add_Class.php';</script>";
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Class</title>
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

    /* Full-width input fields */
    input[type=text],input[type=password],input[type=mail],input[type=date],input[type=time],select {
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

/* Overwrite default styles of hr */


/* Set a style for the submit/register button */
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
  

/* Set a grey background color and center the text of the "sign in" section */
  .signin {
  background-color: #f1f1f1;
  text-align: center;
  }
</style>
</head>
<body>
  <div class="container-fluid page-body-wrapper">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="Dashboard.php">           
            <h2><span class="text-primary">A Step </span>Ahead</h2>
        </a>
    </div>
    </nav>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="Dashboard.php">
              <span class="menu-title  font-weight-bold">Dashboard</span>
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
            <a class="nav-link" href="CategoryEntry.php">
              <span class="menu-title font-weight-bold">Manage Category</span>
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
    <form action="EditClass.php" method="POST" enctype="multipart/form-data">
        <table align="center" cellpadding="5">
                <tr>
                    <td>Class ID</td>
                    <td><input type="text" name="txtClassID" value="<?php echo $arr['ClassID']; ?>" readonly required></td>
                </tr>
                 <tr>
                    <td>Category:</td>
                    <td>
                        <select name="txtcategory">
                            <option><?php echo $arr['Category']; ?></option>
                            <?php
                            $categoryselect="SELECT DISTINCT CategoryName FROM Category";
                            $categoryret=mysqli_query($connection,$categoryselect);
                            $categorycount=mysqli_num_rows($categoryret);
                            for ($i=0;$i < $categorycount; $i++)
                            {
                                $row=mysqli_fetch_array($categoryret);
                                $categoryname=$row['CategoryName'];
                                echo "<option>$categoryname</option>";
                            }
                            ?>
                        </select>
                    </td>
                <tr>
                <tr>
                    <td>Course Name:</td>
                    <td> 
                        <select name="txtcoursename">
                            <option><?php echo $arr['CourseName']; ?></option>
                            <?php
                            $courseselect="SELECT DISTINCT CourseName FROM Course";
                            $ret=mysqli_query($connection,$courseselect);
                            $coursecount=mysqli_num_rows($ret);
                            for ($i=0;$i < $coursecount; $i++)
                            {
                                $row=mysqli_fetch_array($ret);
                                $coursename=$row['CourseName'];
                                echo "<option>$coursename</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>Lecturer</td>
                    <td>
                        <select name="txtlecturer">
                            <option><?php echo $arr['Lecturer']; ?></option>
                            <?php
                            $lecturerselect="SELECT DISTINCT LecturerName FROM Lecturer";
                            $ret=mysqli_query($connection,$lecturerselect);
                            $lecturercount=mysqli_num_rows($ret);
                            for ($i=0;$i < $lecturercount; $i++)
                            {
                                $row=mysqli_fetch_array($ret);
                                $lecturername=$row['LecturerName'];
                                echo "<option>$lecturername</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Path:</td>
                    <td>
                        <input type="file" name="txtpath" required>
                    </td>
                </tr>
                <tr>
                    <td>Start Date:</td>
                    <td><input type="date" name="txtStartDate" value="<?php echo $arr['StartDate']; ?>" required></td>
                </tr>
                <tr>
                    <td>End Date:</td>
                    <td><input type="date" name="txtEndDate" value="<?php echo $arr['EndDate']; ?>" required></td>
                </tr>
                <tr>
                    <td>Start Time:</td>
                    <td><input type="Time" name="txtTime" value="<?php echo $arr['Time']; ?>" required></td>
                </tr>
                <tr>
                    <td>End Time:</td>
                    <td><input type="Time" name="txtETime" value="<?php echo $arr['ETime']; ?>" required></td>
                </tr>
                <tr>
                    <td>Fees:</td>
                    <td><input type="text" name="txtFees" value="<?php echo $arr['Fees']; ?>" required></td>
                </tr>
                <tr>
                    <td>Seats:</td>
                    <td>
                        <input type="text" name="txtSeats" value="<?php echo $arr['Seats']; ?>">
                    </td>
                </tr>
                    <td></td>
                    <td>
                        <?php 
                            if (isset($_GET['Mode'])) {
                                echo "<input class='registerbtn' type='submit' name='btnupdate' value='Update'>";
                            }
                            else{
                                echo "<input class='registerbtn' type='submit' name='btnsave' value='Save'>";
                            }
                         ?>
                         <input class='registerbtn' type="reset" name="btncancel" value="Cancel">
                    </td>
                </tr>
            </table>
    </form>
</div>
</div>
</div>    
</body>
</html>