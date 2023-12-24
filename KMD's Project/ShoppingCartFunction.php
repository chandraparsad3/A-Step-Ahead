<?php 
  function Insert($ClassID,$Quantity)
  {
  	$connection=mysqli_connect("localhost","root","","ahead");
  	$sql="Select * From class where classID='$ClassID'";
 	$ret=mysqli_query($connection,$sql);
 	if(mysqli_num_rows($ret)<1)
 	{
 		return false;
 	}
 	$row=mysqli_fetch_array($ret);
 	$CourseName=$row['CourseName'];
 	$Price=$row['Fees'];
 	$Lecturer=$row['Lecturer'];
 	$StartDate=$row['StartDate'];
 	$EndDate=$row['EndDate'];
 	$StartTime=$row['Time'];
 	$EndTime=$row['ETime'];
 	$Category=$row['Category'];
 	$TotalQuantity=$row['Seats'];
 	$Image=$row['Path'];
 	if(isset($_SESSION['ShoppingCart']))
    {
 			$size=count($_SESSION['ShoppingCart']);
 			$_SESSION['ShoppingCart'][$size]['ClassID']=$ClassID;
 	        $_SESSION['ShoppingCart'][$size]['CourseName']=$CourseName;
 	        $_SESSION['ShoppingCart'][$size]['Category']=$Category;
 	        $_SESSION['ShoppingCart'][$size]['Lecturer']=$Lecturer;
 	        $_SESSION['ShoppingCart'][$size]['StartDate']=$StartDate;
 	        $_SESSION['ShoppingCart'][$size]['EndDate']=$EndDate;
 	        $_SESSION['ShoppingCart'][$size]['Time']=$StartTime;
 	        $_SESSION['ShoppingCart'][$size]['ETime']=$EndTime;
 	        $_SESSION['ShoppingCart'][$size]['Path']=$Image;
 	        $_SESSION['ShoppingCart'][$size]['Fees']=$Price;
 	        $_SESSION['ShoppingCart'][$size]['Quantity']=$Quantity;
  	}
 	else
 	{
 		    $_SESSION['ShoppingCart']=array();
 		    $_SESSION['ShoppingCart'][0]['ClassID']=$ClassID;
 	        $_SESSION['ShoppingCart'][0]['CourseName']=$CourseName;
 	        $_SESSION['ShoppingCart'][0]['Category']=$Category;
 	        $_SESSION['ShoppingCart'][0]['Lecturer']=$Lecturer;
 	        $_SESSION['ShoppingCart'][0]['StartDate']=$StartDate;
 	        $_SESSION['ShoppingCart'][0]['EndDate']=$EndDate;
 	        $_SESSION['ShoppingCart'][0]['Time']=$StartTime;
 	        $_SESSION['ShoppingCart'][0]['ETime']=$EndTime;
 	        $_SESSION['ShoppingCart'][0]['Path']=$Image;
 	        $_SESSION['ShoppingCart'][0]['Fees']=$Price;
 	        $_SESSION['ShoppingCart'][0]['Quantity']=$Quantity;
 	}
 }
 	function Remove($ClassID)
 	{
 		$index=IndexOf($ClassID);
 		if($index>-1)
 		{
 			unset($_SESSION['ShoppingCart'][$index]);

 		}
 		$_SESSION['ShoppingCart']=array_values($_SESSION['ShoppingCart']);
 		echo "<script>window.location='ShoppingCart.php';</script>";
 	}
 	function Clear()
 	{
 		unset($_SESSION['ShoppingCart']);
 		echo "<script>window.location='ShoppingCart.php';</script>";
 	}
 	function Get_TotalAmount()
 	{
 		if(!isset($_SESSION['ShoppingCart']))
 		{
 			return 0;
 		}
 		$total=0;
 		$size=count($_SESSION['ShoppingCart']);
 		for($i=0;$i<$size;$i++)
 		{
 			$Quantity=$_SESSION['ShoppingCart'][$i]['Quantity'];
 			$Price=$_SESSION['ShoppingCart'][$i]['Fees'];
 			$total=$total+($Quantity*$Price);
 		}
 		return $total;
 	}
 	 function Get_TotalQuantity()
 	{
 		if(!isset($_SESSION['ShoppingCart']))
 		{
 			return 0;
 		}
 		else
 	    {		
 		  return count($_SESSION['ShoppingCart']);
 		}  
 	}
 	function IndexOf($ClassID)
 	{
 		$size=count($_SESSION['ShoppingCart']);
 		for($i=0;$i<$size;$i++)
 		{
 			if($ClassID==$_SESSION['ShoppingCart'][$i]['ClassID']){
 				return $i;
 			}
 		}
   }
 ?>