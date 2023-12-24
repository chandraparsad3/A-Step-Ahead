<?php
 session_start();
 include('AutoID_Function.php');
 include('ShoppingCartFunction.php');
 include('Connection.php');
 if(!isset($_SESSION['StudentID']))
 {
 	echo "<script>window.alert('Please Login First');</script>";
 	echo "<script>window.location='StudentLogin.php';</script>";
 }
  if(isset($_POST['btnCheckout']))
  {
  	$RID=$_POST['txtRegisterID'];
  	$Rdate=$_POST['txtRegisterDate'];
  	$RegisterDate=date('Y-m-d',strtotime($Rdate));
  	$StudentID=$_SESSION['StudentID'];
  	$StudentName=$_POST['txtStudentName'];
  	$PayType=$_POST['rdoPayType'];
    if(is_null($PayType))
    {
      echo "<script>window.alert('Please select the payment option');</script>";
    }
  	$bankcard=$_POST['txtbankcard'];
  	$OrderInsert="Insert into Registration values('$RID','$RegisterDate','$StudentID','$StudentName','$PayType','$bankcard')";
  	$ret=mysqli_query($connection,$OrderInsert);
  	$size=count($_SESSION['ShoppingCart']);
  	for($i=0;$i<$size;$i++)
  	{
  		$ClassID=$_SESSION['ShoppingCart'][$i]['ClassID'];
  		$Quantity=$_SESSION['ShoppingCart'][$i]['Quantity'];
  		$Fees=$_SESSION['ShoppingCart'][$i]['Fees'];
  		$Amount=$_SESSION['ShoppingCart'][$i]['Quantity']*$_SESSION['ShoppingCart'][$i]['Fees'];
  		$RegisterDetailInsert="Insert into Register_Detail Values ('$RID','$ClassID','$StudentID','$Quantity','$Fees','$Amount')";
  		$ret=mysqli_query($connection,$RegisterDetailInsert);
  		$UpdateQuantity="Update Class Set Seats=Seats-'$Quantity' Where ClassID='$ClassID'";
  		$ret1=mysqli_query($connection,$UpdateQuantity);
  	}
  	unset($_SESSION['ShoppingCart']);
  	echo "<script>window.alert('Checkout Process Complete);</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A Step Ahead:
        Welcome
       <?php 
        if(isset($_SESSION['StudentID']))
        {
            echo $_SESSION['FirstName'];
        }
        else
        {
            echo "GUEST";
        }
        ?>  
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="HTML Templates" name="keywords">
    <meta content="HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
   <style type="text/css">
     * {
      box-sizing: border-box;
      color:black;
    }
    input[type=text], input[type=password],input[type=Email],input[type=date] {
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
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0"><span class="text-primary">A Step </span>Ahead</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                        <small>123 Street, Mandalay, Myanmar</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>info@example.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>+95(0)9795538589</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none"  href="ClassDisplay.php" style="height: 67px; padding: 0 30px;">
                    <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Course</h5>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                    </a>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="teacher.php" class="nav-item nav-link">Teachers</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="ShoppingCart.php" class="nav-item nav-link active">Cart</a>
                        </div>
                        <?php
                         if(isset($_SESSION['StudentID']))  
                            {
                                $StudentID=$_SESSION['StudentID'];
                                echo "<a href='UpdateStudent.php?StudentID=$StudentID&Mode=Update' class='btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2'>Profile</a>";
                            }   
                        else
                            echo "<a class='btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2' href='register.php'>Sign Up</a>";
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
	<fieldset>
		<legend></legend>
		<form action='Checkout.php' method='POST'>
			<table align='Center'>
				<tr>
					<td>RegistrationID:</td>
					<td><input type="text" name="txtRegisterID"  value="<?php echo AutoID('Registration','RegisterID','R-','6'); ?>" readonly ></td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="txtStudentName" value="<?php echo $_SESSION['FirstName'].' '.$_SESSION['LastName'] ?>" radonly></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="txtMail" value="<?php echo $_SESSION['Mail'] ?>" readonly></td>
				</tr>
				<tr>
					<td>Register Date :</td>
					<td><input type="text" name="txtRegisterDate" value="<?php echo date('d-M-Y'); ?>" readonly></td>
				</tr>
				<tr>
					<td>Payment Option: </td>
					<td>
						<input type="radio" name="rdoPayType" value="BankTransfer" >Bank Transfer<br>
						<input type="radio" name="rdoPayType" value="Visa/Master" >Visa/Master Card<br>
						<input type="text" name="txtbankcard" id="bankcard" placeholder="backCard Info">
					</td>
				</tr>
				<tr>
				<tr>
					<td>Total Amount</td>
					<td><input type="text" name="txtTotalAmount" value="<?php echo Get_TotalAmount(); ?>" readonly></td>
				</tr>
				<tr>
					<td>Total Quantity</td>
					<td><input type="text" name="txtTotalQuality" value="<?php echo Get_TotalQuantity(); ?>" readonly></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name='btnCheckout' value="CheckOut" class="registerbtn">
						<input type="reset" name="Cancel Order" class="registerbtn">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
  <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Mandalay, Myanmar</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+95(0)9795538589</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Newsletter</h5>
                <p>Get in touch with us send us message for feedback or Inquiry. Your Feedback and Inquiry are welcomed.</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">AstepAhead. All Rights Reserved. Designed By Pradeep Bhandari.</a>
                </p>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/main.js"></script>
</body>

</html>