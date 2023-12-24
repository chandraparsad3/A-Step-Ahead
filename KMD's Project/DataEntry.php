<?php
 include('Connection.php');
 if(isset($_POST['btnsubmit']))
  {
    $pid=$_POST['txtProductID'];
    $category=$_POST['txtcategory'];
    $image=$_FILES['txtPath']['name'];
    $folder="Images/";
    if($image)
    {
    	$filename=$folder.$pid."_".$image;
    	$copy=copy($_FILES['txtPath']['tmp_name'],$filename);
    	if(!$copy)
    	{
    		exit("Something went wrong");
    	}
    }
    $check="Select * From something where ProductID='$pid'";
    $sql=mysqli_query($connection,$check);
    $num=mysqli_num_rows($sql);
    if($num>0)
    {
    	echo "<script>window.alert('ProductID already exit');</script>";
    	echo "<script>window.location='DataEntry.php';</script>";
    }
    else{
       $check="Insert into Something values('$pid','$filename','$category')";
       $sql=mysqli_query($connection,$check);

    if($sql)
    {
    	echo "<script>window.alert('Product Insert Successfully);</script>";
    	echo "<script>window.location='DataEntry.php';</script>";
    }
    else
    {
    	echo "<script>window.alert('Something went wrong');</script>";
    	// echo "<script>window.location='DataEntry.php';</script>";
    }
}

  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>This is Testing</title>
</head>
<body>
	<form action="DataEntry.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>Data Entry</legend>
			<table align="center">
				<tr>
					<td>ProductID:</td>
					<td><input type="text" name="txtProductID"></td>
				</tr>
				<tr>
					<td>Image:</td>
					<td><input type="file" name='txtPath' required></td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
					<select name="txtcategory">
						<option>-Select</option>
						<?php 
                          $check="Select Distinct CategoryName From Category";
                          $sql=mysqli_query($connection,$check);
                          $rows=mysqli_num_rows($sql);
                          for($i=0;$i<$rows;$i++)
                          {
                            $value=mysqli_fetch_array($sql);
                            $categoryName=$value['CategoryName'];
                            echo "<option>$categoryName</option>";
                          }
						?>
					</select>
				   </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnsubmit">
					<input type="reset" name="btnreset" value="Reset"></td>
				</tr>
			</table>
		</fieldset>
	</form>

</body>
</html>