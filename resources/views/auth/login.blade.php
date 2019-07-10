
<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />

    <title>Login | Partum Gateway </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->


    <!--begin::Base Styles -->
    <link href="./assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->


<!-- begin::Body -->
<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >



<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">


    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">

                    <div class="m-login__wrapper" style="border:solid 1px #d8e1ec">

                        <div class="m-login__logo">
                            <a href="/">
                                <img src="/assets/images/logo.png">
                            </a>
                        </div>

                        @include("alert")

                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h2 class="m-login__title" style="font-size: 30px;">Sign In </h2>

                            </div>








                            <form class="m-login__form m-form" action="" method="post">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" value="{{old("email")}}" name="email" autocomplete="off">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="remember"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <span class="m-login__account-msg">
						Don't have an account yet ?
						</span>&nbsp;&nbsp;
                        <a href="/register" id="m_login_signup" class="m-link m-link--focus m-login__account-link">Sign Up</a>


                    </div>

                </div>
                <div class="m-stack__item m-stack__item--center">

                    <div class="m-login__account">

                     <span class="m-login__account-msg">

						</span>&nbsp;&nbsp;<a href="/" id="m_login_signup" class="m-link m-link--focus
                        m-login__account-link">Back to home page</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(./assets/app/media/img//bg/bg-4.jpg)">
            <div class="m-grid__item">
                <h3 class="m-login__welcome" align="center">Welcome to <br>Partum Gateway</h3>
                <p class="m-login__msg" align="center">
                  At Partum Gateway We make it happen
                </p>
            </div>
        </div>
    </div>


</div>
<!-- end:: Page -->


<!--begin::Base Scripts -->
<script src="./assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="./assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->





<!--begin::Page Snippets -->
<script src="./assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
<!--end::Page Snippets -->


</body>
<!-- end::Body -->
</html>