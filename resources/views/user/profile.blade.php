<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Profile | Partum Gateway</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::Page Vendors Styles -->
    <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles -->

    <!--begin::Base Styles -->
    <link href="./assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="./assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->

    {{--    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico"/>--}}

</head>
<!-- end::Head -->


<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">


<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">


    <!-- BEGIN: Header -->
@include("inc.header2")
<!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                    class="la la-close"></i></button>

    @include("inc.sidebar2")
    <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Profile</h3>
                    </div>
                    <div style="padding:10px">
  							<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					Today {{date("D jS, M, Y")}}

				</span>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                <!--Begin::Section-->
                <div class="row">

                    @include("alert")
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet m-portlet--full-height  ">
                            <div class="m-portlet__body">
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        My Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="@if(!empty(Auth::user()->profile_pic)){{Auth::user()->profile_pic}} @else {{"/images/noimagefound.jpg"}}@endif" alt="">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">{{Auth::user()->full_name()}}</span>
                                        <a href="" class="m-card-profile__email m-link">{{Auth::user()->email}}</a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">Section</span>
                                    </li>

                                    <li class="m-nav__item">
                                        <a href="{{route("showTransactions")}}" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">Transactions</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="{{route("showDashboard")}}" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                            <span class="m-nav__link-text">Deposit</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="{{route("showWithdrawal")}}" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                            <span class="m-nav__link-text">Withdraw</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="#" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-time-3"></i>
                                            <span class="m-nav__link-text">Change Password</span>
                                        </a>
                                    </li>

                                </ul>

                                <div class="m-portlet__body-separator"></div>

                                <div class="m-widget1 m-widget1--paddingless">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Savings Balance</h3>
                                                <span class="m-widget1__desc"></span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-success">₦{{($balance != null ? number_format($balance->balance / 100) : "0")}}.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Savings this month</h3>

                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-brand">₦{{number_format($total_month_saving)}}.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Withdrawals this month</h3>

                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">₦{{$withdrawals}}.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                Update Profile
                                            </a>
                                        </li>

                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                Settings
                                            </a>
                                        </li>

                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
                                                Update Profile Pic
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_5" role="tab">
                                                Update Bank Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route("doEditProfile")}}" method="post">
                                        @csrf
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                   Alert
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">1. Personal Details</h3>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">First Name</label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" name="first_name" value="{{ucfirst(strtolower(Auth::user()->first_name))}}" required/>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Last Name</label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" name="last_name" value="{{ucfirst(strtolower(Auth::user()->last_name))}}" required/>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Email </label>
                                                <div class="col-7">
                                                    <input disabled class="form-control m-input" type="text" value="{{Auth::user()->email}}" required>

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" name="phone" value="{{Auth::user()->phone}}" required>
                                                </div>
                                            </div>

                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>











                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane " id="m_user_profile_tab_3">

                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route("doChangePassword")}}" method="post">
                                        @csrf
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    Alert
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section"> Change Password</h3>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Current Password </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="password" name="current-password" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">New  Password</label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="password" name="password" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Confirm New Password </label>
                                                <div class="col-7">
                                                    <input  class="form-control m-input" type="password" name="password_confirmation" required>

                                                </div>
                                            </div>










                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <div class="tab-pane " id="m_user_profile_tab_4">

                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route("doUploadPic")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    Alert
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-md-3 offset-3">
                                                    <img src="@if(!empty(Auth::user()->profile_pic)){{Auth::user()->profile_pic}} @else {{"/images/noimagefound.jpg"}}@endif" alt="" class="img-thumbnail">

                                                </div> <br />
                                                <div class="col-10 ml-auto">

                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Select Image </label>
                                                <div class="col-7">
                                                    <input  type="file" class="form-control m-input" name="image" onchange="readURL(this)" style="width:400px;" required/>
                                                    <img id="blah" src="#" alt="your image" style="display:none;" />

                                                </div>
                                            </div>


                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane " id="m_user_profile_tab_5">

                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route("doAddBank")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    Alert
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section"> Update Bank </h3>

                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Select Bank </label>
                                                <div class="col-7">
                                                    <select name="bank_name" class="form-control" required>
                                                             @if(!empty($bank))
                                                            <option value="">{{$bank->bank_name}}</option>
                                                            @endif
                                                        <option value="044+ACCESS BANK">ACCESS BANK</option>
                                                        <option value="323+ACCESSMOBILE">ACCESSMOBILE</option>
                                                        <option value="401+ASO SAVINGS AND LOANS">ASO SAVINGS AND LOANS</option>
                                                        <option value="317+CELLULANT">CELLULANT</option>
                                                        <option value="001+CENTRAL BANK OF NIGERIA">CENTRAL BANK OF NIGERIA</option>
                                                        <option value="023+CITIBANK">CITIBANK</option>
                                                        <option value="559+CORONATION MERCHANT BANK">CORONATION MERCHANT BANK</option>
                                                        <option value="310+CORPORETTI">CORPORETTI</option>
                                                        <option value="551+COVENANT MICROFINANCE BANK">COVENANT MICROFINANCE BANK</option>
                                                        <option value="063+DIAMOND BANK">DIAMOND BANK</option>
                                                        <option value="302+EARTHOLEUM (QIK QIK)">EARTHOLEUM (QIK QIK)</option>
                                                        <option value="050+ECOBANK NIGERIA">ECOBANK NIGERIA</option>
                                                        <option value="307+ECOMOBILE">ECOMOBILE</option>
                                                        <option value="562+EKONDO MICROFINANCE BANK">EKONDO MICROFINANCE BANK</option>
                                                        <option value="084+ENTERPRISE BANK">ENTERPRISE BANK</option>
                                                        <option value="040+EQUITORIAL TRUST BANK">EQUITORIAL TRUST BANK</option>
                                                        <option value="306+E-TRANZACT">E-TRANZACT</option>
                                                        <option value="309+FBN M-MONEY">FBN M-MONEY</option>
                                                        <option value="413+FBN MORTGAGES">FBN MORTGAGES</option>
                                                        <option value="314+FETS (MY WALLET)">FETS (MY WALLET)</option>
                                                        <option value="070+FIDELITY BANK">FIDELITY BANK</option>
                                                        <option value="318+FIDELITY MOBILE">FIDELITY MOBILE</option>
                                                        <option value="608+FINATRUST MICROFINANCE BANK">FINATRUST MICROFINANCE BANK</option>
                                                        <option value="011+FIRST BANK OF NIGERIA">FIRST BANK OF NIGERIA</option>
                                                        <option value="214+FIRST CITY MONUMENT BANK">FIRST CITY MONUMENT BANK</option>
                                                        <option value="085+FIRST INLAND BANK">FIRST INLAND BANK</option>
                                                        <option value="501+FORTIS MICROFINANCE BANK">FORTIS MICROFINANCE BANK</option>
                                                        <option value="308+FORTIS MOBILE">FORTIS MOBILE</option>
                                                        <option value="601+FSDH">FSDH</option>
                                                        <option value="315+GT MOBILE MONEY">GT MOBILE MONEY</option>
                                                        <option value="058+GUARANTY TRUST BANK">GUARANTY TRUST BANK</option>
                                                        <option value="324+HEDONMARK">HEDONMARK</option>
                                                        <option value="030+HERITAGE BANK">HERITAGE BANK</option>
                                                        <option value="415+IMPERIAL HOMES MORTGAGE BANK">IMPERIAL HOMES MORTGAGE BANK</option>
                                                        <option value="069+INTERCONTINENTAL BANK">INTERCONTINENTAL BANK</option>
                                                        <option value="301+JAIZ BANK">JAIZ BANK</option>
                                                        <option value="402+JUBILEE LIFE">JUBILEE LIFE</option>
                                                        <option value="303+KEGOW">KEGOW</option>
                                                        <option value="082+KEYSTONE BANK">KEYSTONE BANK</option>
                                                        <option value="014+MAINSTREET BANK">MAINSTREET BANK</option>
                                                        <option value="330+MIMONEY (POWERED BY INTELLIFIN)">MIMONEY (POWERED BY INTELLIFIN)</option>
                                                        <option value="313+M-KUDI">M-KUDI</option>
                                                        <option value="312+MONETIZE">MONETIZE</option>
                                                        <option value="325+MONEYBOX">MONEYBOX</option>
                                                        <option value="561+NEW PRUDENTIAL BANK">NEW PRUDENTIAL BANK</option>
                                                        <option value="552+NPF MFB">NPF MFB</option>
                                                        <option value="056+OCEANIC BANK">OCEANIC BANK</option>
                                                        <option value="606+OMOLUABI SAVINGS AND LOANS">OMOLUABI SAVINGS AND LOANS</option>
                                                        <option value="565+ONE FINANCE">ONE FINANCE</option>
                                                        <option value="327+PAGA">PAGA</option>
                                                        <option value="560+PAGE MFBANK">PAGE MFBANK</option>
                                                        <option value="502+PARALLEX">PARALLEX</option>
                                                        <option value="311+PARKWAY (READY CASH)">PARKWAY (READY CASH)</option>
                                                        <option value="329+PAYATTITUDE ONLINE">PAYATTITUDE ONLINE</option>
                                                        <option value="304+PAYCOM">PAYCOM</option>
                                                        <option value="101+PROVIDUS BANK">PROVIDUS BANK</option>
                                                        <option value="403+SAFETRUST MORTGAGE BANK">SAFETRUST MORTGAGE BANK</option>
                                                        <option value="609+SEED CAPITAL MICROFINANCE BANK">SEED CAPITAL MICROFINANCE BANK</option>
                                                        <option value="076+SKYE BANK">SKYE BANK</option>
                                                        <option value="221+STANBIC IBTC BANK">STANBIC IBTC BANK</option>
                                                        <option value="304+STANBIC MOBILE">STANBIC MOBILE</option>
                                                        <option value="068+STANDARD CHARTERED BANK">STANDARD CHARTERED BANK</option>
                                                        <option value="232+STERLING BANK">STERLING BANK</option>
                                                        <option value="326+STERLING MOBILE">STERLING MOBILE</option>
                                                        <option value="100+SUNTRUST">SUNTRUST</option>
                                                        <option value="319+TEASY MOBILE">TEASY MOBILE</option>
                                                        <option value="523+TRUSTBOND">TRUSTBOND</option>
                                                        <option value="316+U-MO">U-MO</option>
                                                        <option value="032+UNION BANK OF NIGERIA">UNION BANK OF NIGERIA</option>
                                                        <option value="033+UNITED BANK FOR AFRICA">UNITED BANK FOR AFRICA</option>
                                                        <option value="215+UNITY BANK">UNITY BANK</option>
                                                        <option value="566+VFD MICROFINANCE BANK">VFD MICROFINANCE BANK</option>
                                                        <option value="328+VISUAL ICT">VISUAL ICT</option>
                                                        <option value="320+VTNETWORK">VTNETWORK</option>
                                                        <option value="035+WEMA BANK">WEMA BANK</option>
                                                        <option value="057+ZENITH BANK">ZENITH BANK</option>
                                                        <option value="322+ZENITH MOBILE">ZENITH MOBILE</option>
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Account Number </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" name="account_number" value="@if(!empty($bank)) {{$bank->acc_number}}@endif" required />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!--End::Section-->

                <!--Begin::Section-->

                <!--End::Section-->

                <!--Begin::Section-->
                <div class="row">


                </div>


                <!--End::Section-->                </div>
        </div>


    </div>
    <!-- end:: Body -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $('#blah').css("display","block");
                $('#blah')
                    .attr('src', e.target.result).width(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

    <!-- begin::Footer -->
@include("inc.footer2")
<!-- end::Footer -->


</div>
<!-- end:: Page -->


<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->            <!-- begin::Quick Nav -->

<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->


<!--begin::Page Vendors Scripts -->
<script src="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors Scripts -->


<!--begin::Page Snippets -->
<script src="/assets/app/js/dashboard.js" type="text/javascript"></script>
<!--end::Page Snippets -->

</body>
<!-- end::Body -->
</html>