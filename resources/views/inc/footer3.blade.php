
<section class="gold-gradient-bg sectionP40">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-7 col-xs-12 res-txt-center">
                    <h2 class="white rL m0" style="margin-top: 6px;">Why waste time?</h2>
                </div>
                <div class="col-md-6 col-sm-5 col-xs-12 res-txt-center">
                    <a href="/register" ><button class="btn btn-white-outline pull-right res-float-none" style="margin: 0">Start saving Now !</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="contact-section" class="sectionP60 dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                @include('alert')
                <div class="col-md-7 col-sm-7 col-xs-12 pull-right resCont">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-text">
                            <span class="gold-gradient-color">Get in touch.</span>
                        </div>
                    </div>
                    <form action="{{route("doContactUs")}}" method="post">

                        @csrf
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="First Name" style="color:white;" type="text" name="first_name" required>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Last Name" style="color:white;" type="text" name="last_name" required>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Email Address" type="text" style="color:white;"
                                           name="email" required>
                                    <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Mobile or Telephone" style="color:white;" type="text" name="phone" >
                                    <span style="position: absolute"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-box">
                                    <textarea placeholder="Type your message here..." name="message" id="" cols="30"
                                              rows="5" style="color:white;"></textarea>
                                    <span style="position: absolute"><i class="fa fa-comments"></i></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient outline-button pull-right mtb20"><div
                                    style="background: #0C1222;transition: all 0.3s">Send <tag
                                        class="hidden-xs">Message</tag></div></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-5 col-xs-12 border-right resCompany">
                    <div class="company-desc logoo">
                        <a href="#home-section"><img class="img-responsive" src="assets/images/logo.png"/></a>
                        <p class="light2 rl">
                            Please Pay us a Visit: No. 10, Akinsanya Street, Ojodu, Lagos, Nigeria.
                            <br />(Mon-Fri from 9am-5pm)</p>
                    </div>

                    <div class="cont-us">
                        <p class="gold rL">Contact Us</p>

                        <div><a class="light2 g" href="javascript:;"><span class="oR">Tel : +234 901 570 1985</span></a></div>
                        <div><a class="light2 g" href="javascript:;"><span class="oR">Email : support.pg@partumgateway.com</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<section class="sectionP20" style="background: #0b101d;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <p class="white" style="opacity: .65">&copy; Copyright {{date("Y")}}, all rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<button onclick="topFunction()" id="myBtn" class="btn btn-gradient"><i class="visible-xs fa fa-arrow-up"></i><tag class="hidden-xs">Back To Top</tag></button>