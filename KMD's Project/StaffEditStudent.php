<?php 
    include('Connection.php');
    if (isset($_POST['btnupdate'])) {
        $sid=$_POST['txtStudentID'];
        $fname=$_POST['txtFName'];
        $lname=$_POST['txtLName'];
        $phone=$_POST['txtPhone'];
        $email=$_POST['txtEmail'];
        $password=$_POST['txtPassword'];
        $address=$_POST['txtAddress'];
        $dob=$_POST['txtDOB'];
        $gender=$_POST['txtGender'];
        $Update="UPDATE Student SET 
                 FirstName='$fname',
                 LastName='$lname',
                 Phone='$phone',
                 Mail='$email',
                 Password='$password',
                 Address='$address',
                 DOB='$dob',
                 Gender='$gender'
                 WHERE StudentID='$sid'";
        $result=mysqli_query($connection,$Update);
        $date='2012-01-01';
        if($dob>=$date)
        {
          echo "<script>window.alert('This user is not eligible for this position. Student is too young to be registred.');</script>";
          echo "<script>window.location='StaffStudentRegister.php';</script>";
        }
        elseif ($result) {
            echo "<script>window.alert('Student Update Successful');</script>";
            echo "<script>window.location='staffStudentRegister.php';</script>";
        }
        else{
            echo "<script>window.alert('Student Record Cannot Update');</script>";
            echo "<script>window.location='staffStudentRegister.php';</script>";
        }
      }
      if (isset($_REQUEST['StudentID'])) {
        $studentID=$_REQUEST['StudentID'];
        $query="SELECT * FROM student WHERE studentID='$studentID'";
        $ret=mysqli_query($connection,$query);
        $arr=mysqli_fetch_array($ret);
      }
       else{
        echo "<script>window.alert('Please Choose Studnet ID.');</script>";
        echo "<script>window.location='StudentRegister.php';</script>";
      }
 ?>
<!DOCTYPE html>
<html>
<head>
        <title>Update Student</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/admin-style.css">
  <!-- endinject -->
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
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
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
     <form action="StaffEditStudent.php" method="POST">
        <table align="center" cellpadding="5">
                <tr>
                    <td>Student ID</td>
                    <td><input type="text" name="txtStudentID" value="<?php echo $arr['StudentID']; ?>" readonly required></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="txtFName" value="<?php echo $arr['FirstName']; ?>" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="txtLName" value="<?php echo $arr['LastName']; ?>" required></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="txtPhone" value="<?php echo $arr['Phone']; ?>" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="txtEmail" value="<?php echo $arr['Mail']; ?>" readonly required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="txtPassword" value="<?php echo $arr['Password']; ?>" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="txtAddress" value="<?php echo $arr['Address']; ?>" required></td>
                </tr>
                <tr>
                    <td>DOB:</td>
                    <td>
                        <input type="date" name="txtDOB" value="<?php echo $arr['DOB']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="text" name="txtGender" value="<?php echo $arr['Gender']; ?>"  readonly required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php 
                            if (isset($_GET['Mode'])) {
                                echo "<input class='registerbtn' type='submit' name='btnupdate' value='Update' class='registerbtn'>";
                            }
                            else{
                                echo "<input class='registerbtn' type='submit' name='btnsave' value='Save' class='registerbtn'>";
                            }
                         ?>
                         <input  class='registerbtn' type="reset" name="btncancel" value="Cancel" class='registerbtn'>
                    </td>
                </tr>
            </table>
    </form>
</body>
</div>
</div>
</div>  
</html>