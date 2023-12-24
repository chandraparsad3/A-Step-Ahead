 <?php
  session_start();
  $LecturerID=$_SESSION['LecturerID'];
  $Name=$_SESSION['Name'];
  include('Connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A Step Ahead- Time Table </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
   
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Schedule</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Schedule</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Classes That You Gonna Teach</h5>
                <h1>Time Table of Classes</h1>
            </div>
            <div >
                <div>
              <fieldset>
                <legend>
                    Class listing
                </legend>
                <table cellspacing="10">
                    <tr>
                        <td>
                            <?php
                            $date=date('Y-m-d');
                            $query="SELECT * FROM Class where Lecturer='$Name' and EndDate>='$date' ORDER BY  ClassID";
                            $ret=mysqli_query($connection,$query);
                            $num_results=mysqli_num_rows($ret);
                            if ($num_results==0)
                            {
                                echo "<h2>No Record found</h2>";
                            }
                            else
                            {
                                echo "<table width='100%' cellpadding='10' border='2'>";
                                    echo "<tr>";
                                        echo "<th align='left'>ClassID</th>";
                                        echo "<th align='left'>Category</th>";
                                        echo "<th align='left'>Course Name</th>";
                                        echo "<th align='left'>Lecturer</th>";
                                        echo "<th align='left'>Path</th>";
                                        echo "<th align='left'>Start Date</th>";
                                        echo "<th align='left'>End Date</th>";
                                        echo "<th align='left'>StartTime</th>";
                                        echo "<th align='left'>EndTime</th>";
                                    echo "</tr>";

                                    for ($i=0; $i <$num_results; $i++)
                                    {
                                        $row=mysqli_fetch_array($ret);
                                        $ClassID=$row['ClassID'];
                                        $Cimage=$row['Path'];
                                        echo "<tr>";
                                        echo "<td>" .$row['ClassID']. "</td>";
                                        echo "<td>" .$row['Category'] ."</td>";
                                        echo "<td>" .$row['CourseName']. "</td>";
                                        echo "<td>" .$row['Lecturer'] ."</td>";
                                        echo "<td><img src='$Cimage' width='100px' height='100px'/></td>";
                                        echo "<td>" .$row['StartDate']. "</td>";
                                        echo "<td>" .$row['EndDate']. "</td>";
                                        echo "<td>" .$row['Time'] . "</td>";
                                        echo "<td>" .$row['ETime'] . "</td>";
                                    }
                                echo "</table>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
             </fieldset>
        </form>
    </fieldset>
                </div>
            </div>
        </div>
    </div>
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