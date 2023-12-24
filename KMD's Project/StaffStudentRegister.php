<?php 
     include('Connection.php');
     include('AutoID_Function.php');
     if(isset($_POST['btnsubmit']))
     {
    	$StudentID=$_POST['txtstudentID'];
    	$Firstname=$_POST['txtFirstname'];
    	$Secondname=$_POST['txtSecondname'];
    	$Phone=$_POST['txtPhone'];
    	$Mail=$_POST['txtMail'];
    	$Password=$_POST['txtPassword'];
    	$Address=$_POST['txtAddress'];
    	$DOB=date("Y-m-d",strtotime($_POST['txtdob']));
    	$Gender=$_POST['rdoGender'];
      $check="Select * from student where Mail='$Mail'";
    	$result=mysqli_query($connection,$check);
    	$count=mysqli_num_rows($result);
      $date='2012-01-01';
      if($DOB>=$date)
      {
          echo "<script>window.alert('This user is not eligible for this position. Student is too young to be registred.');</script>";
          echo "<script>window.location='StaffStudentRegister.php';</script>";
      }
    	elseif($count>0)
    	{
    		echo "<script>window.alert('User Email Already Exit');</script>";
        echo "<script>window.location='StaffStudentRegister.php'</script>";
    	}
    	else
    	{
    		$Insert="insert into student(StudentID,FirstName,LastName,Phone,Mail,Password,Address,DOB,Gender)
                 values('$StudentID','$Firstname','$Secondname','$Phone','$Mail','$Password','$Address','$DOB',
                '$Gender')";
    		$Insertret=mysqli_query($connection,$Insert);
    		if($Insertret)
    		{
    			echo "<script>window.alert('User Account Created Scuuessfully');</script>";
          echo "<script>window.location='StaffStudentRegister.php'</script>";
    		}
    		else
    		{
    			echo "<script>window.alert('Something went wrong');</script>";
          echo "<script>window.location='StaffStudentRegister.php'</script>";     
    		}
    	}

    }
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Manage Student</title>
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
    input[type=text], input[type=password],input[type=mail],input[type=date] {
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
   <form action="StaffStudentRegister.php" method="POST">
   	<fieldset>
   		<legend>Enter Your Information:</legend>
   		<table align="Center">
         <tr>
          <td>StudentID</td>
          <td><input type="Text" name="txtstudentID"  value="<?php echo AutoID('Student','StudentID','SU-','6'); ?>" readonly required></td>
         </tr> 
        <tr>
   				<td>First Name</td>
   				<td><input type="Text" name="txtFirstname" placeholder="Please Enter Your First Name" required></td>
   			</tr>
   			<tr>
   				<td>Second Name</td>
   				<td><input type="Text" name="txtSecondname" placeholder="Please Enter Your Surname" required></td>
   			</tr>
   			<tr>
   				<td>Phone</td>
   				<td><input type="Text" name="txtPhone" placeholder="Please Enter Your Phone" required></td>
   			</tr>
   			<tr>
   				<td>User Email</td>
   				<td><input type="mail" name="txtMail" placeholder="example@gmail.com" required></td>
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
      <legend>Student Information</legend>
          <table>
              <tr>
                <td>
                  <?php
                      $query="SELECT * FROM Student ORDER BY studentID";
                      $ret=mysqli_query($connection,$query);
                      $num_results=mysqli_num_rows($ret);
                      if ($num_results==0) {
                           echo "<h2>No Record Found</h2>";
                       }
                      else{
                           echo "<table width='100%' cellpadding='8'>";
                           echo "<tr>";
                           echo "<th algin='left'>Student ID</th>";
                           echo "<th algin='left'>First Name</th>";
                           echo "<th algin='left'>Last Name</th>";
                           echo "<th algin='left'>Phone</th>";
                           echo "<th algin='left'>Email</th>";
                           echo "<th algin='left' width='50px'>Password</th>";
                           echo "<th algin='left'>Address</th>";
                           echo "<th algin='left'>DOB</th>";
                           echo "<th algin='left'>Gender</th>";
                           echo "</tr>";
                              for($i=0;$i<$num_results;$i++)
                              {
                                $row=mysqli_fetch_array($ret);
                                $StudentID=$row["StudentID"];
                                  echo "<tr>";
                                  echo "<td>".$row["StudentID"]."</td>";
                                  echo "<td>".$row["FirstName"]."</td>";
                                  echo "<td>".$row["LastName"]."</td>";
                                  echo "<td>".$row["Phone"]."</td>";
                                  echo "<td>".$row["Mail"]."</td>";
                                  echo "<td>".$row["Password"]."</td>";
                                  echo "<td>".$row["Address"]."</td>";
                                  echo "<td>".$row["DOB"]."</td>";
                                  echo "<td>".$row["Gender"]."</td>";
                                   
                                  echo "<td><a href='StaffEditStudent.php?StudentID=$StudentID&Mode=Update'>Edit</a>|<a href='DeleteStudent.php?StudentID=$StudentID'>Delete</a></td>";
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