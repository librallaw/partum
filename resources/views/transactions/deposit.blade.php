<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Deposit | Partum  Gateway</title>
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
    <link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles -->

    <!--begin::Base Styles -->
    <link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>
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
                        <h3 class="m-subheader__title ">Deposit</h3>
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
                    <div class="col-xl-4">
                        <!--begin:: Widgets/Blog-->
                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                            <div class="m-portlet__head m-portlet__head--fit-">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            Savings Balance
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline   m-dropdown--align-push">
                                            <a href="#"
                                               class="m-portlet__nav-link m-dropdown__toggle  btn  m-btn btn-outline-light m-btn--hover-light">
                                                Save Now
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="m-widget27 m-portlet-fit--sides">
                                    <div class="m-widget27__pic">
                                        <img src="/assets/app/media/img//bg/bg-4.jpg" alt="">
                                        <h3 class="m-widget27__title m--font-light">
                                            <span><span>₦</span>256,100</span>
                                        </h3>
                                        <div class="m-widget27__btn">
                                            <button type="button"
                                                    class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">
                                                All Savings
                                            </button>
                                        </div>
                                    </div>
                                    <div class="m-widget27__container">
                                        <!-- begin::Nav pills -->
                                        <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">

                                            <li class="m-widget27__nav-item nav-item">
                                                <a class="nav-link active" data-toggle="pill"
                                                   href="#m_personal_income_quater_2">Add to your Savings Account</a>
                                            </li>


                                        </ul>
                                        <!-- end::Nav pills -->

                                        <!-- begin::Tab Content -->
                                        <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                            <div id="m_personal_income_quater_1" class="tab-pane active">
                                                <div class="row  align-items-center">
                                                    <div class="col">

                                                        <form>
                                                            Add to from your savings Account
                                                            <div class="form-group">

                                                                <input type="number" class="form-control"
                                                                       placeholder="Enter amount"
                                                                />
                                                            </div>

                                                            <button class="btn btn-info">Submit</button>
                                                        </form>


                                                    </div>

                                                </div>
                                            </div>



                                        </div>
                                        <!-- end::Tab Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:: Widgets/Blog-->


                    </div>



                    <div class="col-xl-4">
                        <!--begin:: Packages-->
                        <div class="m-portlet m--bg-warning m-portlet--bordered-semi m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            Daily Savings/Withdrawals
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">

                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <!--begin::Widget 29-->
                                <div class="m-widget29">
                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total savings for this Month</h3>
                                        <div class="m-widget_content-items">
                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span class="m--font-accent">N680</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total Withdrawals this month</h3>
                                        <div class="m-widget_content-items">

                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span>0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total Failed Transactions this month</h3>
                                        <div class="m-widget_content-items">

                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span>29</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--end::Widget 29-->
                            </div>
                        </div>
                        <!--end:: Packages-->


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