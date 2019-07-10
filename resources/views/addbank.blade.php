<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Partum Gateway - A Savings Site">
    <title>Add Bank - Partum Gateway</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='/images/favicon.ico' />
    <!-- /site favicon -->

    <!-- Font Material stylesheet -->
    <link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- /font material stylesheet -->

    <!--Weather stylesheet-->
    <link rel="stylesheet" href="fonts/weather-icons-master/css/weather-icons.min.css">
    <!-- /Weather stylesheet -->

    <!-- Bootstrap stylesheet -->
    <link href="/css/jumbo-bootstrap.css" rel="stylesheet">
    <!-- /bootstrap stylesheet -->

    <!-- Perfect Scrollbar stylesheet -->
    <link href="/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Owl carousel -->
    <link href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <!-- /owl carousel -->

    <!-- Jumbo-core stylesheet -->
    <link href="/css/jumbo-core.min.css" rel="stylesheet">
    <!-- /jumbo-core stylesheet -->

    <!-- Color-Theme stylesheet -->
    <link id="override-css-id" href="/css/theme-dark-indigo.css" rel="stylesheet">
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
 @include("inc.sidebar")
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
                            <div class="alert alert-info">
                                Partum Gateway is Secure
                                Your security is our only priority: Your bank details are NEVER shared with anyone. It is only required to securely send your savings back to your bank account whenever you choose.
                            </div>
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
                                                                 src="//images/money.jpg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 order-md-5">


                                                    <div class="pt-3 p-lg-5 ">
                                                    
                                                        <form method="post" action="" id="settingsform45a6190f7">

                                                            <div class="form-group">
                                                                <label class="form-label" for="number">Bank Account Number</label>
                                                                <div class="controls">
                                                                    <input type="number" class="form-control" name="bank_account" onblur="" id="" value="" required="">
                                                                </div>
                                                                <div class="help-block">
                                                                    <small style="color:green;" class="blink_me"><b>Please make sure it's YOUR bank information.</b></small>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label" for="bank">Select your Bank</label>
                                                                <div class="controls">
                                                                    <select title="Select your Bank" class="form-control" name="bank_name" id="bankcode45a6190f7" onchange="resetbankform45a6190f7();" required=""><option value="">Select a Bank</option><option value="4a7499">Access Bank</option><option value="669b98">Diamond Bank</option><option value="970174">EcoBank</option><option value="8c8ec8">FCMB</option><option value="9ffae1">Fidelity Bank</option><option value="9b366c">First Bank</option><option value="188435">GTB</option><option value="3f00ad">Heritage Bank</option><option value="86fd27">Jaiz Bank</option><option value="93ab01">Keystone Bank</option><option value="6b6faa">Skye Bank</option><option value="5e0589">Stanbic IBTC Bank</option><option value="2b8a37">Standard Chartered Bank</option><option value="744118">Sterling Bank</option><option value="82533e">UBA</option><option value="26b54b">Union Bank</option><option value="4a59f3">Unity Bank</option><option value="5e15fb">Wema Bank</option><option value="958071">Zenith Bank</option></select>								</div>
                                                            </div>



                                                            <div style="display:none" class="finalbutton45a6190f7">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Account Name (received from your bank)</label>
                                                                    <div class="controls">
                                                                        <input type="text" class="form-control" name="name" id="accountname45a6190f7" value="">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <input type="hidden" name="edit" value="1">
                                                                        <button type="submit" class="btn btn-lg btn-success" id="updatesettings45a6190f7"><i class="fa fa-plus"></i> Add My Bank</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @csrf
                                                            <button type="submit" class="gx-btn gx-btn-green">
                                                                <i class="zmdi zmdi-money-box"></i>
                                                                <span>Add</span></button>

                                                        </form>




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
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<!--Bootstrap JQuery-->
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--Perfect Scrollbar JQuery-->
<script src="/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<!--Big Slide JQuery-->
<script src="/node_modules/bigslide/dist/bigSlide.min.js"></script>
<!--Owl Carousel JQuery-->
<script src="/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<!--Custom JQuery-->
<script src="/js/functions.js"></script>
<script src="/js/custom/aboutus.js"></script>

</body>
</html>

