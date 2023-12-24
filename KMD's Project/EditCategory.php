<?php 
    include('connection.php');
    if (isset($_POST['btnupdate'])) {
        $cid=$_POST['txtCategoryID'];
        $cname=$_POST['txtCategoryName'];
        $Update="UPDATE Category SET 
                 CategoryName='$cname'
                 WHERE CategoryID='$cid'";
        $result=mysqli_query($connection,$Update);
        if ($result) {
            echo "<script>window.alert('Category Update Successful');</script>";
            echo "<script>window.location='CategoryEntry.php';</script>";
        }
        else{
            echo "<script>window.alert('Category Record Cannot Update');</script>";
            echo "<script>window.location='CategoryEntry.php';</script>";
        }
    }
    if (isset($_REQUEST['CategoryID'])) {
        $CategoryID=$_REQUEST['CategoryID'];
        $query="SELECT * FROM Category WHERE CategoryID='$CategoryID'";
        $ret=mysqli_query($connection,$query);
        $arr=mysqli_fetch_array($ret);
    }
    else{
        echo "<script>window.alert('Please Choose Category ID.');</script>";
        echo "<script>window.location='CategoryEntry.php';</script>";
    }
 ?>
<!DOCTYPE html>
 <html>
 <head>
    <title>Category Update</title>
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
    <form action="EditCategory.php" method="POST">
        <table align="center" cellpadding="5">
                <tr>
                    <td>Category ID</td>
                    <td><input type="text" name="txtCategoryID" value="<?php echo $arr['CategoryID']; ?>" readonly required></td>
                </tr>
                <tr>
                    <td>Category Name:</td>
                    <td><input type="text" name="txtCategoryName" value="<?php echo $arr['CategoryName']; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php 
                            if (isset($_GET['Mode'])) {
                                echo "<input class='registerbtn' type='submit' name='btnupdate' value='Update'>";
                            }
                            else{
                                echo "<input class='registerbtn' type='submit' name='btnsave' value='Submit'>";
                            }
                         ?>
                         <input class='registerbtn' type="reset" name="btncancel" value='Clear'>
                    </td>
                </tr>
            </table>
    </form>
</div>
</div>
</div>    
</body>
</html>