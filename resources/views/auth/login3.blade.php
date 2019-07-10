
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Partum Gateway</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--All css  are here-->

    <!--Bootstrap css here-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!--Font-Awsome css here-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--Owl-carousel css here-->
    <link rel="stylesheet" href="assets/plugins/owl/owl.carousel.css">
    <link rel="stylesheet" href="assets/plugins/owl/owl.theme.css">
    <link rel="stylesheet" href="assets/plugins/owl/owl.transitions.css">

    <!--Custon css here-->
    <link rel="stylesheet" href="assets/css/custom.css">


    <!--Responsive css here-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/aos.css"/>

    <!--Slider Custon css here-->
    <link rel="stylesheet" href="assets/css/header-fix.css">


</head>
<body>

<div class="se-pre-con"></div>

<!--TOP SECTION START HERE-->

<section id="topNav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 p0">
                <div class="col-md-6 col-sm-6 col-xs-12 p0">
                    <ul class="list-inline">
                        <li><a href="javascript:;">Mobile : +1 987654 - 3210</a></li>
                        <li><a href="javascript:;">Email : info@example.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" >
                    <ul class="list-inline floatRight">
                        <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--TOP SECTION END HERE-->

<!-- NAVIGATION -->
<nav class="navbar navbar-default fixedNavbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header logoo">
            <button id="tog-btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home-section"><img class="img-responsive" src="assets/images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                <li class="gold"><a href="/register"><button class="  btn btn-gradient outline-button" style="margin-bottom: 0px;" ><div style="background: #1C589B;transition: all 0.3s;">Register</div></button></a></li>
            </ul>
            <ul id="navigation" class="nav navbar-nav navbar-right">
                <li><a class="active" href="#home-section">Home</a></li>
                <li><a href="#about-section">About</a></li>
                <li><a href="#how">How?</a></li>
                <li><a href="#extra">Extra</a></li>
                <!--<li><a href="#features-section">Features</a></li>-->
                <li><a href="#testimonial-section">Testimonial</a></li>
                <li><a href="#contact-section">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs visible-sm">
                <li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="/register" >Register</a></li>
            </ul>
        </div>

    </div>
</nav>
<!-- NAVIGATION -->


<!-- HEADER -->
<section id="home-section" class="header-bg">
    <div class="gradient sectionP60 header-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                            <div class="login-div centered" data-aos="fade-up" data-aos-duration="1000">
                                <div class="head">
                                    <h3 class="purple oR m0">LOGIN</h3>
                                    <p class="light oR">Enter your credentials to login.</p>
                                </div>
                                <form action="" method="post">
                                    @csrf
                                    <div class="body">
                                        <div class="input-box">
                                            <input placeholder="Email or Username" name="email" value="{{old("email")}}" type="text" required>
                                            <span style="position: absolute"><i class="fa fa-user"></i></span>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                        <div class="input-box">
                                            <input placeholder="Password" name="password" type="password" required>
                                            <span style="position: absolute"><i class="fa fa-key"></i></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <div class="foot">
                                        <a href="javascript:;" class="forgot pull-left"><small>forgot your password?</small></a>
                                        <button class="btn btn-gradient W100 pull-right" data-aos="zoom-in-up" data-aos-duration="800">Login!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 header-text sectionP60">
                            <h3 class="rL white">LOGIN</h3>
                            <p class="rL white">click the button below if you already have an account.</p>
                            <button class="btn btn-gradient" data-aos="zoom-in-up" data-aos-duration="800">Login to your account</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HEADER -->

<!-- About -->

<!-- About -->
<section class="counter-bg">
    <div class="sectionP40 blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="responsive" data-aos="fade-right" data-aos-duration="1000">
                            <div class="heading-text">
                                <span class="gold-gradient-color">Little bit of stats.</span>
                            </div>
                            <p class="light2 oL" style="font-size: 16px;">We afford our users the golden opportunity to adequately develop and manage a stable financial life by intuitively growing their savings.

                            </p>

                        </div>
                    </div>
                    <div id="counter" class="col-md-5 col-sm-12 col-xs-12 pull-right resPad0">
                        <div class="col-md-6 col-sm-3 col-xs-6 br bb">
                            <div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">

                                <p class="white oR gold-gradient-color">Safe & Secure</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6 bb">
                            <div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">

                                <p class="white oR ">Safe,Secure And Convenient

                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6 br">
                            <div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">

                                <p class="white oR">Mobile Privacy And Security</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6">
                            <div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">

                                <p class="white oR gold-gradient-color">Cash Out Anytime</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Footer Section -->
<footer id="contact-section" class="sectionP60 dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-7 col-sm-7 col-xs-12 pull-right resCont">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-text">
                            <span class="gold-gradient-color">Get in touch.</span>
                        </div>
                    </div>
                    <form action="">
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Full Name" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Email Address" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Mobile or Telephone" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Subject" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-puzzle-piece"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-box">
                                    <textarea placeholder="Type your message here..." name="" id="" cols="30" rows="5"></textarea>
                                    <span style="position: absolute"><i class="fa fa-comments"></i></span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-gradient outline-button pull-right mtb20"><div style="background: #0C1222;transition: all 0.3s">Send <tag class="hidden-xs">Message</tag></div></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-5 col-xs-12 border-right resCompany">
                    <div class="company-desc logoo">
                        <a href="#home-section"><img class="img-responsive" src="assets/images/logo.png"/></a>
                        <p class="light2 rl">
                            Operations Office: No. 16, Boyle Street, Lagos Island, Lagos, Nigeria.
                            08093719000 (Mon-Fri from 9am-5pm)</p>
                    </div>

                    <div class="cont-us">
                        <p class="gold rL">Contact Us</p>
                        <div><a class="light2 g" href="javascript:;"><span class="oR">Landline : + 1123456789</span></a></div>
                        <div><a class="light2 g" href="javascript:;"><span class="oR">Mobile : +1 123456789</span></a></div>
                        <div><a class="light2 g" href="javascript:;"><span class="oR">Email : partum@email.com</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section -->

<!-- Copyright Section -->
<section class="sectionP20" style="background: #0b101d;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <p class="light oR m0" style="opacity: .65">&copy; Copyright 2017, all rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Copyright Section -->

<!-- Scroll Back Top Button -->
<button onclick="topFunction()" id="myBtn" class="btn btn-gradient"><i class="visible-xs fa fa-arrow-up"></i><tag class="hidden-xs">Back To Top</tag></button>
<!-- Scroll Back Top Button -->


<!-- Popups Are Here -->
<popups>

    <!-- Register Popup -->
    <div id="pop-register" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" data-aos="zoom-in-up" data-aos-duration="800">&times;</button>
                    <h3 class="modal-title  blue oR m0">REGISTER</h3>
                    <span class="light oR" style="font-size: 14px">Enter your informations to register.</span>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="input-box">
                            <input placeholder="Full Name" type="text" required>
                            <span style="position: absolute"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-box">
                            <input placeholder="Email Address" type="email" required>
                            <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
                        </div>
                        <div class="input-box">
                            <input placeholder="Login Key" type="text" required>
                            <span style="position: absolute"><i class="fa fa-key"></i></span>
                        </div>
                        <div class="input-box">
                            <input placeholder="Confirm Login Key" type="text" required>
                            <span style="position: absolute"><i class="fa fa-key"></i></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-gradient" data-dismiss="modal">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</popups>




<!-- All Javascripts -->


<!-- All Javascripts -->

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="assets/js/bootstrap.js"></script>

<!-- Nice Scroll -->
<script type="text/javascript" src="assets/plugins/niceScroll/niceScroll.min.js"></script>

<!-- Google Map -->


<!-- Video Background -->
<script type="text/javascript" src="assets/plugins/videoBg/jquery.vide.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="assets/plugins/owl/owl.carousel.js"></script>

<!-- Number Counter -->
<script type="text/javascript" src="assets/plugins/numScroll/numscroller-1.0.js"></script>

<!-- Scroll Animations aos-master js -->
<script src="assets/plugins/aos-master/aos.js"></script>

<!-- Common -->
<script type="text/javascript" src="assets/js/common.js"></script>

<!-- header-fix page js -->
<script type="text/javascript" src="assets/js/header-fix.js"></script>

<!-- All Javascripts -->
</body>
</html>
