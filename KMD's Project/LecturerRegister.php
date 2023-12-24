<?php 
     include('Connection.php');
     include('AutoID_Function.php');
     if(isset($_POST['btnsubmit']))
     {
    	$LecturerID=$_POST['txtLecturerID'];
    	$Firstname=$_POST['txtFirstname'];
    	$Secondname=$_POST['txtSecondname'];
    	$Phone=$_POST['txtPhone'];
    	$Mail=$_POST['txtMail'];
      $Degree=$_POST['txtDegree'];
    	$Password=$_POST['txtPassword'];
    	$Address=$_POST['txtAddress'];
    	$DOB=date("Y-m-d",strtotime($_POST['txtdob']));
    	$Gender=$_POST['rdoGender'];
      $check="Select * from Lecturer where Mail='$Mail'";
    	$result=mysqli_query($connection,$check);
    	$count=mysqli_num_rows($result);
    	if($count>0)
    	{
    		echo "<script>window.alert('User Email Already Exit');</script>";
    	}
    	else
    	{
    		$Insert="insert into Lecturer(LecturerID,FirstName,LastName,Phone,Mail,Degree,Password,Address,DOB,Gender)
                 values('$LecturerID','$Firstname','$Secondname','$Phone','$Mail','$Degree','$Password','$Address','$DOB',
                '$Gender')";
    		$Insertret=mysqli_query($connection,$Insert);
    		if($Insertret)
    		{
    			echo "<script>window.alert('User Account Created Scuuessfully');</script>";
    		}
    		else
    		{
    			echo "<script>window.alert('Something went wrong');</script>";
    		}
    	}

    }
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sign up</title>
 </head>
 <body>
   <form action="LecturerRegister.php" method="POST">
   	<fieldset>
   		<legend>Enter Your Information:</legend>
   		<table align="Center">
         <tr>
          <td>LecturerID</td>
          <td><input type="Text" name="txtLecturerID"  value="" required></td>
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
   				<td><input type="Email" name="txtMail" placeholder="example@gmail.com" required></td>
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
   				<td><input type="submit" name="btnsubmit">
   				    <input type="reset" value="clear"></td>
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
                           echo "<th algin='left'>First Name</th>";
                           echo "<th algin='left'>Last Name</th>";
                           echo "<th algin='left'>Phone</th>";
                           echo "<th algin='left'>Admin Email</th>";
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
                                  echo "<tr>";
                                  echo "<td>".$row["LecturerID"]."</td>";
                                  echo "<td>".$row["FirstName"]."</td>";
                                  echo "<td>".$row["LastName"]."</td>";
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
 </body>
 </html>