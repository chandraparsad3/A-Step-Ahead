<?php
    session_start();
    include('connection.php');
    if(isset($_POST['btnLogin']))
    {
        $LecturerEmail=$_POST['txtEmail'];
        $Password=$_POST['txtPassword'];
        $query="SELECT * FROM Lecturer WHERE Mail='$LecturerEmail' AND Password='$Password'";
        $result=mysqli_query($connection,$query);
        $count=mysqli_num_rows($result);
        if ($count>0) {
            $arr=mysqli_fetch_array($result);
            $_SESSION['LecturerID']=$arr['LecturerID'];
            $_SESSION['Name']=$arr['Name'];
            echo "<script>alert('Login Successful');</script>";
            echo "<script>
            window.location='LecturerTime.php'</script>";
           
        }
        else{
            echo "<script>alert('Login Fail');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lecturer Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="HTML Templates" name="keywords">
    <meta content="HTML Templates" name="description">
    <link href="img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   <style type="text/css">
     * {
      box-sizing: border-box;
      color:black;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=Email] {
    width: 75%;
    padding: 15px;
    margin: 5px  22px 0;
    display: inline-block;
    border: none;
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
  </style>
</head>
<body>
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
    <!-- Topbar End -->
   <form action='LecturerLogin.php' method="POST">
    <fieldset>
       	<table align="center">
   		<tr>
   			<td>Email</td>
   			<td><input type="Email" name="txtEmail"></td>
   		</tr>
   		<tr>
   			<td>Password</td>
   			<td><input type="Password" name="txtPassword"></td>
   		</tr>
   		<tr>
   		 <td></td>
   		 <td><input type="submit" name="btnLogin" value="Login" class="registerbtn">
       <input  class="registerbtn" type="reset" value="Clear" class="btn"/></td></td>
         </tr>	
   	</table>
   </fieldset>
   </form>
   <!--footer start-->
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
    <!--footer End-->
</body>
</html> 