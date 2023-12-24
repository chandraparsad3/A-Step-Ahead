 <?php
    include('Connection.php'); 
    include('AutoID_Function.php');
    if (isset($_POST['btnsave']))
    {
        $clid=$_POST['txtclassid'];
        $category=$_POST['txtcategory'];
        $coursename=$_POST['txtcoursename'];
        $lecturer=$_POST['txtlecturer'];
        $startdate=date("Y-m-d",strtotime($_POST['txtstartdate']));
        $startdates=date("Y-m-d",strtotime($_POST['txtstartdate']));
        $enddate=date("Y-m-d",strtotime($_POST['txtenddate']));
        $time=date('H:i A', strtotime($_POST['txttime']));
        $etime=date('H:i A', strtotime($_POST['txtEtime']));
        $fees=$_POST['txtfees'];
        $seats=$_POST['txtseats'];
        $image=$_FILES['txtPath']['name'];
        $folder="Images/";
        if($image)
        {
            $filename=$folder.$clid."_".$image;
            $copied=copy($_FILES['txtPath']['tmp_name'],$filename);
            if(!$copied)
            {
                exit("Problem occured.");
            }
        }
        while (strtotime($startdate) <= strtotime($enddate)) 
        {
           $check="select * From Class where Lecturer='$lecturer' and Time='$time' and EndDate>='$startdates'";
           //Time gonna have only four cases
           //Cases 1. 8:45 to 10:15
           //Cases 2. 10:30 to 12:00
           //Cases 3. 12:45 to 2:15
           //Cases 4. 2:30 to 4:00
           // For the current moment 
           $result=mysqli_query($connection,$check);
           $counts=mysqli_num_rows($result);
         if ($counts>0) {
            echo "<script>window.alert('Lecturer is not free during that time');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
         }
         $startdate = date ("Y-m-d", strtotime("+1 days", strtotime($startdate)));
        }
        $checkclass="SELECT * FROM class WHERE ClassID='$clid'";
        $ret=mysqli_query($connection,$checkclass);
        $count=mysqli_num_rows($ret);
        if ($count>0)
        {
            echo "<script>window.alert('Class is already exist');</script>";
            echo "<script>window.location='StaffAdd_Class.php';</script>";
        }
        elseif ($counts>0) {
            echo "<script>window.alert('Lecturer is not free during that time');</script>";
            echo "<script>window.location='StaffAdd_Class.php';</script>";
        }
        elseif(($startdates<date('Y-m-d'))or ($startdates>=$enddate))
        {
            echo "<script>window.alert('PleaseEnter Correct Date');</script>";
            echo "<script>window.location='StaffAdd_Class.php';</script>";
        }
        else
        {
            $insertclass="INSERT INTO Class VALUES('$clid','$category','$coursename','$lecturer','$filename','$startdates','$enddate','$time','$etime','$fees','$seats')";
            $ret=mysqli_query($connection,$insertclass);
            if($ret)
            {
                echo "<script>window.alert('Successfully Add Class');</script>";
                echo "<script>window.location='StaffAdd_Class.php';</script>";
            }
            else
            {
                echo "<p>Error in product Page:".mysqli_error($connection)."</p>";
            }
        }
    } 
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Manage Class
    </title>
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
    input[type=text], input[type=password],input[type=mail],input[type=date],input[type=Time],input[type=Number],select {
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
            <a class="nav-link" href="StaffDashboard.php">
              <span class="menu-title font-weight-bold">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="StaffAdd_Class.php" >
              <span class="menu-title font-weight-bold">Manage Class</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="StaffStudentRegister.php">
              <span class="menu-title font-weight-bold">Manage Student</span>
            </a>
          </li>
        </ul>
      </nav>
   <div class="main-panel">
    <div class="content-wrapper">
    <fieldset>
        <legend>Class Information Here : </legend>
        <form action="StaffAdd_Class.php" method="post" enctype="multipart/form-data" id="form1">
            <table align="center" cellpadding="5">
                <tr>
                    <td>Class ID :</td>
                    <td>
                        <input type="text" name="txtclassid" value="<?php echo AutoID('Class','ClassID','CL-','6'); ?>" readonly required>
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                            <select name="txtcategory">
                            <option>-Select Category</option>
                            <?php
                            $categoryselect="SELECT DISTINCT CategoryName FROM Category";
                            $categoryret=mysqli_query($connection,$categoryselect);
                            $categorycount=mysqli_num_rows($categoryret);
                            for ($i=0;$i < $categorycount; $i++)
                            {
                                $row=mysqli_fetch_array($categoryret);
                                $categoryname=$row['CategoryName'];
                                echo "<option value='$categoryname'>$categoryname</option>";
                            }
                            ?>
                        </select>
                    </td>
                <tr>
                    <td>Course Name:</td>
                    <td>
                        <select name="txtcoursename">
                        <option>-Select CourseName</option>
                         <?php
                            $courseselect="SELECT DISTINCT CourseName FROM Course";
                            $courseret=mysqli_query($connection,$courseselect);
                            $coursecount=mysqli_num_rows($courseret);
                            for ($i=0;$i < $coursecount; $i++)
                            {
                                $row=mysqli_fetch_array($courseret);
                                $coursename=$row['CourseName'];
                                echo "<option value='$coursename'>$coursename</option>";
                            }
                          ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>Lecturer</td>
                    <td>
                        <select name="txtlecturer">
                            <option>-Select LecturerName</option>
                            <?php
                            $lecturerselect="SELECT DISTINCT Name FROM Lecturer";
                            $ret=mysqli_query($connection,$lecturerselect);
                            $lecturercount=mysqli_num_rows($ret);
                            for ($i=0;$i < $lecturercount; $i++)
                            {
                                $row=mysqli_fetch_array($ret);
                                $lecturername=$row['Name'];
                                echo "<option>$lecturername</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>Path:</td>
                    <td>
                        <input type="file" name="txtPath" required>
                    </td>
                </tr>
                <tr>
                    <td>Start Date:</td>
                    <td>
                        <input type="Date" name="txtstartdate" required>
                    </td>
                </tr>
                <tr>
                    <td>End Date:</td>
                    <td>
                        <input type="Date" name="txtenddate" required>
                    </td>
                </tr>
                <tr>
                    <td>Start Time :</td>
                    <td>
                        <input type="time" name="txttime" required>
                    </td>
                </tr>
                <tr>
                    <td>End Time :</td>
                    <td>
                        <input type="time" name="txtEtime" required>
                    </td>
                </tr>
                <tr>
                    <td>Fees</td>
                    <td>
                        <input type="text" name="txtfees" placeholder="Enter the courseFees" required>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Target User</td>
                    <td>
                        <input type="number" name="txtseats" placeholder="Enter the Seats" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        if (isset($_GET['Mode']))
                        {
                            echo "<input class='registerbtn' type='submit' name='btnupdate' value='Update'>";
                        }else
                        {
                            echo  "<input class='registerbtn' type='submit' name='btnsave' value='Save'>";
                        }
                        ?>
                        <input class='registerbtn' type="reset" name="btncancel" value="Cancel">
                    </td>
                </tr>
            </table>
            <fieldset>
                <legend>
                    Class listing
                </legend>
                <table cellspacing="10">
                    <tr>
                        <td>
                            <?php
                               $query="SELECT * FROM Class ORDER BY ClassID";
                               $rets=mysqli_query($connection,$query);
                               $num_results=mysqli_num_rows($ret);
                            if ($num_results==0)
                            {
                                echo "<h2>No Record found</h2>";
                            }
                            else
                            {
                                echo "<table width='100%' cellpadding='10'>";
                                    echo "<tr>";
                                        echo "<th align='left'>ClassID</th>";
                                        echo "<th align='left'>Category</th>";
                                        echo "<th align='left'>Course Name</th>";
                                        echo "<th align='left'>Lecturer</th>";
                                        echo "<th align='left'>Path</th>";
                                        echo "<th align='left'>Start Date</th>";
                                        echo "<th align='left'>End Date</th>";
                                        echo "<th align='left'>StartTime</th>";
                                        echo "<th align='left'>EndTime</th>";
                                        echo "<th align='left'>Fees</th>";                                       
                                        echo "<th align='left' >Seats</th>";
                                    echo "</tr>";

                                    for ($i=0; $i <$num_results; $i++)
                                    {
                                        $row=mysqli_fetch_array($rets);
                                        $ClassID=$row["ClassID"];
                                        $Cimage=$row['Path'];
                                        echo "<tr>";
                                        echo "<td>" .$row['ClassID']. "</td>";
                                        echo "<td>" .$row['Category'] ."</td>";
                                        echo "<td>" .$row['CourseName']. "</td>";
                                        echo "<td>" .$row['Lecturer'] ."</td>";
                                        echo "<td><img src='$Cimage' width='100px' height='100px'/></td>";
                                        echo "<td>" .$row['StartDate']. "</td>";
                                        echo "<td>" .$row['EndDate']. "</td>";
                                        echo "<td>" .$row['Time'] . "</td>";
                                        echo "<td>" .$row['ETime'] . "</td>";
                                        echo "<td>" .$row['Fees']. "</td>";
                                        echo "<td>" .$row['Seats']. "</td>";
                                        echo "<td><a href='StaffEditClass.php?ClassID=$ClassID&Mode=Update'>Edit</a>|<a href='DeleteClass.php?ClassID=$ClassID'>Delete</a></td>";
                                    }
                                echo "</table>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
             </fieldset>
             </form>
    </fieldset>
     </div>
</div>
</div>
</body>
</html>