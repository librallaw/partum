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
                @if(Auth::check())
                    <li class="gold"><a href="/dashboard"><button class="  btn btn-gradient outline-button" style="margin-bottom: 0px;" ><div style="background: #1C589B;transition: all 0.3s;">My account</div></button></a></li>
                @else
                    <li class="gold"><a href="/register"><button class="  btn btn-gradient outline-button" style="margin-bottom: 0px;" ><div style="background: #1C589B;transition: all 0.3s;">Register</div></button></a></li>
                    <li class="gold"><a href="/login"><button class="  btn btn-gradient outline-button" style="margin-bottom: 0px;" ><div style="background: #1C589B;transition: all 0.3s;">Login</div></button></a></li>
                @endif
            </ul>
            <ul id="navigation" class="nav navbar-nav navbar-right">
                <li><a class="active" href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/products">Our Products</a></li>
                <li><a href="/testimonials">Testimonial</a></li>
                <li><a href="/faqs">FAQ</a></li>
                <li><a href="/#contact-section">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs visible-sm">
                @if(Auth::check())

                    <li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="/dashboard">My account</a></li>
                @else
                    <li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="/register">Register</a></li>
                    <li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>

    </div>
</nav>