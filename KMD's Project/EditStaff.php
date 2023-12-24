<?php 
    include('Connection.php');
    if (isset($_POST['btnupdate'])) {
        $sid=$_POST['txtStaffID'];
        $name=$_POST['txtName'];
        $phone=$_POST['txtPhone'];
        $email=$_POST['txtEmail'];
        $degree=$_POST['txtDegree'];
        $password=$_POST['txtPassword'];
        $address=$_POST['txtAddress'];
        $dob=$_POST['txtDOB'];
        $gender=$_POST['txtGender'];
        $Update="UPDATE Staff SET 
                 Name='$name',
                 Phone='$phone',
                 Mail='$email',
                 Degree='$degree',
                 Password='$password',
                 Address='$address',
                 DOB='$dob',
                 Gender='$gender'
                 WHERE StaffID='$sid'";
        $result=mysqli_query($connection,$Update);
       $date='2002-01-01';
       if($dob>=$date)
        {
          echo "<script>window.alert('This user is not eligible for this position. Staff should be at least 20 years old.');</script>";
          echo "<script>window.location='staff.php';</script>";
        }
        elseif ($result) {
            echo "<script>window.alert('Staff Update Successful');</script>";
            echo "<script>window.location='staff.php';</script>";
        }
        else{
            echo "<script>window.alert('Staff Record Cannot Update');</script>";
            echo "<script>window.location='staff.php';</script>";
        }
      }
    if (isset($_REQUEST['StaffID'])) {
        $StaffID=$_REQUEST['StaffID'];
        $query="SELECT * FROM Staff WHERE StaffID='$StaffID'";
        $ret=mysqli_query($connection,$query);
        $arr=mysqli_fetch_array($ret);
    }
    else{
        echo "<script>window.alert('Please Choose Staff ID.');</script>";
        echo "<script>window.location='staff.php';</script>";
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Staff Update</title>
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
    <form action="Editstaff.php" method="POST">
        <table align="center" cellpadding="5">
                <tr>
                    <td>Admin ID</td>
                    <td><input type="text" name="txtStaffID" value="<?php echo $arr['StaffID']; ?>" readonly required></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="txtName" value="<?php echo $arr['Name']; ?>" required></td>
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
                    <td>Degree:</td>
                    <td><input type="text" name="txtDegree" value="<?php echo $arr['Degree']; ?>" required></td>
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
                        <input type="date" name="txtDOB" value="<?php echo $arr['DOB']; ?>"
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="text" name="txtGender" value="<?php echo $arr['Gender']; ?>" readonly required>
                    </td>
                </tr>
                <tr>
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