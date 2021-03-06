<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Partum Gateway - A Savings Site">
    <title>Set Up - Partum Gateway</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <!-- /site favicon -->

    <!-- Font Material stylesheet -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- /font material stylesheet -->

    <!--Weather stylesheet-->
    <link rel="stylesheet" href="fonts/weather-icons-master/css/weather-icons.min.css">
    <!-- /Weather stylesheet -->

    <!-- Bootstrap stylesheet -->
    <link href="css/jumbo-bootstrap.css" rel="stylesheet">
    <!-- /bootstrap stylesheet -->

    <!-- Perfect Scrollbar stylesheet -->
    <link href="node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Owl carousel -->
    <link href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <!-- /owl carousel -->

    <!-- Jumbo-core stylesheet -->
    <link href="css/jumbo-core.min.css" rel="stylesheet">
    <!-- /jumbo-core stylesheet -->

    <!-- Color-Theme stylesheet -->
    <link id="override-css-id" href="css/theme-dark-indigo.css" rel="stylesheet">
    <!-- Color-Theme stylesheet -->

</head>

<body id="body" data-theme="dark-indigo">

<!-- Loader Backdrop -->
<div class="loader-backdrop">
    <!-- Loader -->
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <!-- /loader-->
</div>
<!-- loader backdrop -->

<!-- Page container -->
<div class="gx-container">

    <!-- Page Sidebar -->
    @include ("inc.sidebar")
    <!-- /page sidebar -->

    <!-- Main Container -->
    <div class="gx-main-container">

        <!-- Main Header -->
        @include ("inc.header")
        <!-- /main header -->

        <!-- Main Content -->
        <div class="gx-main-content">
            <!--gx-wrapper-->
            <div class="gx-wrapper">
                <div class="dashboard animated slideInUpTiny animation-duration-3">
                    <div class="page-heading d-sm-flex justify-content-sm-between align-items-sm-center"><h2
                            class="title mb-3 mb-sm-0">Account Setup</h2>

                    </div>

                    <div class="row mb-md-4">
                        <div class="col-lg-12">



                           @include("alert")

                            <!-- Slider-->
                            <div class="owl-carousel owl-theme testimonial-carousel">
                                <div class="item">
                                    <div class="m-1">
                                        <div class="gx-card">
                                            <div class="row align-items-center">
                                                <div class="col-md-5 order-md-7">
                                                    <div class="grid-thumb-equal">
                                                        <div class="grid-thumb-cover">
                                                            <img class="img-fluid"
                                                                 src="/images/money.jpg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 order-md-5">
                                                    <div class="pt-3 p-lg-5 ">
                                                        <h2><strong>Welcome To Partum Gateway. To Begin, Securely Save Your First ₦100.</strong></h2>
                                                        <p>TThis will be your first savings into your Partum Gateway account (you can add much more after this step). What happens after this?
                                                            In The Next Step: You will enter the bank account number you will like to securely withdraw your savings to.
                                                            Final Step: You will be able to set exactly how you want to save. This includes the amount, frequency & target.</p>
                                                       <p> Please be prepared to use your One Time Password (OTP) to complete this transaction. It is 100% SECURE and it ensures that you are the TRUE OWNER of your card.<br/>
                                                        Partum Gateway uses the highest levels of Internet Security, and it's secured by 256 bits SSL security encyption to ensure that your information is completely protected from fraud. Click the button below to continue.</p>


                                                        <a href="{{route("addbank")}}" class="gx-btn gx-btn-green">
                                                            <i class="zmdi zmdi-money-box"></i>
                                                            <span>Start Saving Now</span></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <!-- /slider-->
                        </div>
                    </div>





                </div>
            </div>
            <!--/gx-wrapper-->

            <!-- Footer -->
         @include ("inc.footer")
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /main container -->



</div>
<!-- /page container -->

<!-- Right Sidebar-->

<!-- /Right Sidebar-->

<!-- Menu Backdrop -->
<div class="menu-backdrop fade"></div>
<!-- /menu backdrop -->

<!--Load JQuery-->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!--Bootstrap JQuery-->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--Perfect Scrollbar JQuery-->
<script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<!--Big Slide JQuery-->
<script src="node_modules/bigslide/dist/bigSlide.min.js"></script>
<!--Owl Carousel JQuery-->
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<!--Custom JQuery-->
<script src="js/functions.js"></script>
<script src="js/custom/aboutus.js"></script>

</body>
</html>

