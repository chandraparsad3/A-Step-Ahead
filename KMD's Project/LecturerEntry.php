<?php 
     include('Connection.php');
     include('AutoID_Function.php');
     if(isset($_POST['btnsubmit']))
     {
    	$LecturerID=$_POST['txtLecturerID'];
    	$Name=$_POST['txtName'];
    	$Phone=$_POST['txtPhone'];
    	$Mail=$_POST['txtMail'];
      $Degree=$_POST['txtDegree'];
    	$Password=$_POST['txtPassword'];
    	$Address=$_POST['txtAddress'];
    	$DOB=date("Y-m-d",strtotime($_POST['txtdob']));
    	$Gender=$_POST['rdoGender'];
      $image=$_FILES['txtpath']['name'];
      $folder="Images/";
      if($image)
      {
            $filename=$folder.$LecturerID."_".$image;
            $copied=copy($_FILES['txtpath']['tmp_name'],$filename);
            if(!$copied)
            {
                exit("Problem occured.");
            }
       }
      $check="Select * from Lecturer where Mail='$Mail'";
    	$result=mysqli_query($connection,$check);
    	$count=mysqli_num_rows($result);
     $date='2002-01-01';
     if($DOB>=$date)
     {
       echo "<script>window.alert('This user is not eligible for this position. Lecturer should be at least 20 years old.');</script>";
       echo "<script>window.location('Lecturer.php');</script>";
      }
    	elseif($count>0)
    	{
    		echo "<script>window.alert('User Email Already Exist');</script>";
    	}
    	else
    	{
    		$Insert="insert into Lecturer values('$LecturerID','$Name','$filename','$Phone','$Mail','$Degree','$Password','$Address','$DOB',
                '$Gender')";
    		$Insertret=mysqli_query($connection,$Insert);
    		if($Insertret)
    		{
    			echo "<script>window.alert('User Account Created Scuuessfully');</script>";
          echo "<script>window.location('LecturerEntry.php');</script>";
    		}
    		else
    		{
    			echo "<script>window.alert('Something went wrong');</script>";
          echo "<script>window.location('LecturerEntry.php');</script>";
    		}
    	}

    }
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Manage Lecturer</title>
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
    input[type=text], input[type=password],input[type=email],input[type=date],select{
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
    <form action="LecturerEntry.php" method="post" enctype="multipart/form-data">   	
      <fieldset>
   		<legend>Enter Lecturer Information:</legend>
   		<table align="Center">
        <tr>
          <td>LecturerID</td>
          <td><input type="Text" name="txtLecturerID"  value="<?php echo AutoID('Lecturer','LecturerID','L-','6'); ?>" readonly required></td>
        </tr> 

        <tr>
          <td>Name</td>
          <td><input type="Text" name="txtName" placeholder="Please Enter Your Name" required></td>
        </tr>
        <tr>
          <td>Path:</td>
          <td>
            <input type="file" name='txtpath' required>
          </td>
        </tr>
   			<tr>
   				<td>Phone</td>
   				<td><input type="Text" name="txtPhone" placeholder="Please Enter Your Phone" required></td>
   			</tr>
   			<tr>
   				<td>User Email</td>
   				<td><input type="email" name="txtMail" placeholder="example@gmail.com" required></td>
   			</tr>
        <tr>
          <td>Degree</td>
          <td><input type="text" name="txtDegree" placeholder="B.Sc(Hons.)" required></td>
        </tr>
   			<tr>
   				<td>Password</td>
   				<td><input type="Text" name="txtPassword" placeholder="************" required></td>
   			</tr>
   			<tr>
   				<td>Address</td>
   				<td><input type="Text" name="txtAddress" placeholder="Please Enter Your Address" required></td>
   			</tr>
   			<tr>
   				<td>D0B</td>
   				<td><input type="Date" name="txtdob" required></td>
   			</tr>
   			<tr>
   				<td>Gender</td>
   				<td><input type="radio" name="rdoGender" value="Male">Male
   				    <input type="radio" name="rdoGender" value="Female">Female</td>
   			</tr>       
   			<tr>
   				<td></td>
   				<td><input class="registerbtn" type="submit" name="btnsubmit">
   				    <input class="registerbtn" type="reset" value="clear"></td>
   			</tr>   			   			   			   			   			   			
   		</table>

   	</fieldset>
    <fieldset>
      <legend>Lectuer Information</legend>
          <table>
              <tr>
                <td>
                  <?php
                      $query="SELECT * FROM Lecturer ORDER BY LecturerID";
                      $ret=mysqli_query($connection,$query);
                      $num_results=mysqli_num_rows($ret);
                      if ($num_results==0) {
                           echo "<h2>No Record Found</h2>";
                       }
                      else{
                           echo "<table width='100%' cellpadding='8'>";
                           echo "<tr>";
                           echo "<th algin='left'>Lecturer ID</th>";
                           echo "<th algin='left'>Name</th>";
                           echo "<th algin='left'>Path</th>";
                           echo "<th algin='left'>Phone</th>";
                           echo "<th algin='left'>Email</th>";
                           echo "<th algin='left'>Degree</th>";
                           echo "<th algin='left' width='50px'>Password</th>";
                           echo "<th algin='left'>Address</th>";
                           echo "<th algin='left'>DOB</th>";
                           echo "<th algin='left'>Gender</th>";
                           echo "</tr>";
                              for($i=0;$i<$num_results;$i++)
                              {
                                $row=mysqli_fetch_array($ret);
                                $LecturerID=$row["LecturerID"];
                                $Limage=$row['Path'];
                                  echo "<tr>";
                                  echo "<td>".$row["LecturerID"]."</td>";
                                  echo "<td>".$row["Name"]."</td>";
                                  echo "<td><img src='$Limage' width='100px' height='100px'/></td>";
                                  echo "<td>".$row["Phone"]."</td>";
                                  echo "<td>".$row["Mail"]."</td>";
                                  echo "<td>".$row["Degree"]."</td>";
                                  echo "<td>".$row["Password"]."</td>";
                                  echo "<td>".$row["Address"]."</td>";
                                  echo "<td>".$row["DOB"]."</td>";
                                  echo "<td>".$row["Gender"]."</td>";
                                   
                                  echo "<td><a href='EditLecturer.php?LecturerID=$LecturerID&Mode=Update'>Edit</a>|<a href='DeleteLecturer.php?LecturerID=$LecturerID'>Delete</a></td>";
                                  echo "</tr>";
                                }
                                echo "</table>";        }
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