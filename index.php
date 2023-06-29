<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Project</title>

    <!-- BOOTSTRAP_FONTAESOME_CSS LINKS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">

</head>
<body>

    <!-- TOP NAVIGATION -->

    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5" id="home">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer Happiness is our Goal!</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-targe="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    <!-- ++++++++++++++++++++++++++++ -->
        <div class='collapse navbar-collapse' id="myNavbar">
             <ul class="navbar-nav pl-5">
                 <li class="nav-item">
                     <a href="#home" class="nav-link">Home</a>
                 </li>
                 <li class="nav-item">
                     <a href="#services" class="nav-link">Services</a>
                 </li>
                 <li class="nav-item">
                     <a href="#registration" class="nav-link">Register</a>
                 </li>
                 <li class="nav-item">
                     <a href="user/userlogin.php" class="nav-link">Login</a>
                 </li>
                 <li class="nav-item">
                     <a href="#contact" class="nav-link">Contact</a>
                 </li>
             </ul>
        </div>

    </nav>

                 <!-- HEADER BACKGROUND IMAGE -->


    <header class="jumbotron back-image" style="background-image: url(images/banner.jpg)">
    <div class="headlines">
        <h1 class="text-uppercase text-white font-weight-bold">Welcome To SMS</h1>
        <p class=>Customer Happiness in our Goal!</p>
        <a href="user/userlogin.php" class="btn btn-success mr-4">Login</a>
        <a href="#registration" class="btn btn-danger mr-4">Register</a>
    </div>

    </header>       

    
    <!-- SMS Services INTRODUCTION Section -->


    <div class="container" id="services">
        <div class="jumbotron">
            <h2 class="text-center">SMS Services</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. injected humour, or non-characteristic words etc.</p>
        </div>
    </div>


    <!-- OUR SERVICES SECTION -->

    <div class="container text-center border-bottom">
        <h2>Our Services</h2><br>
        <div class="row mt-4 mb-4">

            <div class="col-sm-4">
                <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                <h4 class="mt-4">Electronic Appliances</h4>
            </div>

            <div class="col-sm-4">
                <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                <h4 class="mt-4">Preventive Maintenace</h4>
            </div>

            <div class="col-sm-4">
                <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div>   <!-- END OUR SERVICES SECTION -->

    <!-- =========  USER REGISTRATION FORM SECTION  ============ -->

    <?php include ("UserRegistration.php"); ?>

<!-- ======= END ==> USER REGISTRATION FORM SECTION  ========  -->



    <!-- HAPPY CUSTOMERS SECTION -->

    <div class="jumbotron bg-danger" id="customers">
        <div class="container">
            <h2 class="text-white text-center">Happy Customer</h2>
            <div class="row mt-5">


                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/custom1.jpg" alt="customer" class="img-fluid mb-2" style="border-radius:200px;">
                            <h4 class="card-title">Jahangir Khan</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, officia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/custom2.jpg" alt="customer" class="img-fluid mb-2" style="border-radius:200px;">
                            <h4 class="card-title">Malik Riaz</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, officia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/custom3.jpg" alt="customer" class="img-fluid mb-2" style="border-radius:200px;">
                            <h4 class="card-title">Jeff Bezos</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, officia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/custom4.jpg" alt="customer" class="img-fluid mb-2" style="border-radius:200px;">
                            <h4 class="card-title">Bill Gates</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, officia.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!--   ======== CONTACT US SECTION  ======== -->


    <div class="container" id="contact">
        <h2 class="text-center mb-5">Contact Us</h2>
        <div class="row">

<!--  ============= CONTACT FORM STARTING   ============== -->

<?php   include ("contactform.php");  ?>

<!--  ============= CONTACT FORM STARTING   ============== -->

            <div class="col-md-4 text-center">
                        <strong>Headquarter:</strong><br>
                        SMS private Ltd,<br>
                        Misrial, Rawalpindi Cantt <br>
                        Rawalpind - 46000 <br>
                        Phone:  +923185099877 <br>
                        <a href="#" target="_blank">www.sms.com</a><br><br>

                        <strong>Branch:</strong><br>
                        SMS private Ltd,<br>
                        Misrial, Rawalpindi Cantt <br>
                        Rawalpind - 46000 <br>
                        Phone:  +923185099877 <br>
                        <a href="#" target="_blank">www.sms.com</a>
            </div>

        </div>
    </div>


    <!-- ======== FOOTER FOOTER FOOTER FOOTER ========== -->


    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">

                <div class="col-md-6">
                    <span class="">Follow Us:</span>
                    <a href="#" target="_blank" class="pl-2 pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
                </div>

                <div class="col-md-6 text-right">
                    <small>Design By Janagir &copy; 2019</small>
                    <small class="ml-2"><a href="admin/login.php">Admin Login</a></small>
                </div>
            </div>
        </div>
    
    
    </footer>





    
    <!-- ======================================================================== -->
    <!-- ALL JAVACRIPT LINKS ======  ALL JAVACRIPT LINKS -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>

    
</body>
</html>