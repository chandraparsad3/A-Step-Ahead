<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AstepAhead-Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
    <!-- Topbar End -->


    <!-- Navbar Start -->
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
                            <a href="blog.php" class="nav-item nav-link active">Blog</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <?php
                         if(isset($_SESSION['StudentID']))  
                            {
                                $StudentID=$_SESSION['StudentID'];
                                echo "<a href='UpdateStudent.php?StudentID=$StudentID&Mode=Update' class='btns'>Profile</a>";
                             }   
                        else
                            echo "<a class='btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2' href='register.php'>Sign Up</a>";

                        ?>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Blog</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-3">
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-1.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-2.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-3.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-1.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-2.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-3.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                                    <p class="text-primary m-0">Jan 01, 2050</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center mb-0">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                        <img src="img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">John Doe</h3>
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est  ipsum erat kasd amet elitr</p>
                    </div>
    
                    <!-- Search Form -->
                    <div class="mb-5">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
    
                    <!-- Category List -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Design</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Development</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Online Marketing</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Keyword Research</a>
                                <span class="badge badge-primary badge-pill">56</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Email Marketing</a>
                                <span class="badge badge-primary badge-pill">98</span>
                            </li>
                        </ul>
                    </div>
    
                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h3>
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">
                            <img class="img-fluid rounded" src="img/blog-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">
                            <img class="img-fluid rounded" src="img/blog-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">
                            <img class="img-fluid rounded" src="img/blog-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                    </div>
    
    </div>
    <!-- Blog End -->

    <!-- Footer Start -->
   
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
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>