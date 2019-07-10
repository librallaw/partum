<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Instant Savings | Partum Gateway</title>
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


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
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
                        <h3 class="m-subheader__title ">Instant Savings</h3>
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
                                            <a href="{{route("loadAutosave")}}"
                                               class="m-portlet__nav-link m-dropdown__toggle  btn  m-btn btn-outline-light m-btn--hover-light">
                                                Auto Save
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
                                            <span><span>₦</span>{{($balance != null ? number_format($balance->balance / 100) : "0")}}.00</span>
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
                                                   href="#m_personal_income_quater_1">Add to Savings </a>
                                            </li>
                                            <li class="m-widget27__nav-item nav-item">
                                                <a class="nav-link" data-toggle="pill"
                                                   href="#m_personal_income_quater_2">Auto Save </a>
                                            </li>


                                        </ul>
                                        <!-- end::Nav pills -->


                                        <!-- begin::Tab Content -->
                                        <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                            <div id="m_personal_income_quater_1" class="tab-pane active">
                                                <div class="row  align-items-center">
                                                    <div class="col">

                                                        <form action="@if(!empty(Auth::user()->authorization_code)){{route('credit')}}@else{{route("pay")}}@endif" method="post">
                                                            Add to your savings Account
                                                            <div class="form-group">
                                                                @csrf

                                                                <input type="number" name="amount" class="form-control"
                                                                       placeholder="Enter amount" required
                                                                />
                                                            </div>

                                                            <button class="btn btn-info" type="submit">Submit</button>
                                                        </form>


                                                    </div>

                                                </div>
                                            </div>
                                            <div id="m_personal_income_quater_2" class="tab-pane fade">
                                                <div class="row  align-items-center">



                                                    @if(!empty($autorisation))

                                                            <div class="col">
                                                                <form method="post" action="{{route('doAutoSave')}}" >


                                                                    <div class="row">
                                                                    <div class="col-md-4 col-sm-4">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" id="materialUnchecked" name="type"  @if(!empty($autosave->type)) @if($autosave->type =="daily") {{"checked"}} @endif @endif value="daily"required >
                                                                            <label class="form-check-label" for="materialUnchecked">Daily</label>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-4 col-sm-4">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" id="materialUnchecked" name="type"  @if(!empty($autosave->type)) @if($autosave->type =="weekly") {{"checked"}} @endif @endif value="weekly"required >
                                                                            <label class="form-check-label" for="materialUnchecked">Weekly</label>
                                                                        </div>


                                                                        </div>

                                                                    <div class="col-md-4 col-xs-4">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" id="materialUnchecked" name="type"  @if(!empty($autosave->type)) @if($autosave->type =="monthly") {{"checked"}} @endif @endif value="monthly"required >
                                                                            <label class="form-check-label" for="materialUnchecked">Monthly</label>
                                                                        </div>
                                                                    </div>
                                                                    </div> <br />
                                                                    @csrf





                                                                    <div class="form-group">

                                                                        <input type="text" class="form-control"
                                                                               placeholder="Enter amount" name="amount" value="@if(!empty($autosave->amount))  {{$autosave->amount}} @endif"
                                                                        />
                                                                    </div>

                                                                    <button class="btn btn-info">Submit</button>
                                                                </form>
                                                            </div>
                                                        @else

                                                            <div class="alert alert-info">
                                                                You need to have made your first saving before you can set auto save
                                                            </div>
                                                        @endif
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
                        <!--begin:: Widgets/Blog-->
                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            Transactions Stats
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--align-right m-dropdown--align-push">
                                            <a href="{{route("showTransactions")}}" class="btn btn--sm  m-btn btn-outline-light m-btn--hover-light">
                                                View All
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="m-widget28">
                                    <div class="m-widget28__pic m-portlet-fit--sides"></div>
                                    <div class="m-widget28__container">
                                        <!-- begin::Nav pills -->
                                        <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                            <li class="m-widget28__nav-item nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#menu11"><span><i
                                                                class="fa flaticon-pie-chart"></i></span><span>Recent Transaction</span></a>
                                            </li>

                                        </ul>
                                        <!-- end::Nav pills -->

                                        <!-- begin::Tab Content -->
                                        @if(count($transactions) > 0)


                                        <div class="m-widget28__tab tab-content">
                                            <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                                <div class="m-widget28__tab-items">
                                                    <div class="m-widget28__tab-item">
                                                        <span>Type </span>
                                                        <span>{{$transactions->trans_type}}</span>
                                                    </div>
                                                    <div class="m-widget28__tab-item">
                                                        <span>Amount</span>
                                                        <span>₦{{number_format($transactions->amount / 100)}}</span>
                                                    </div>
                                                    <div class="m-widget28__tab-item">
                                                        <span>Transaction ID</span>
                                                        <span>{{$transactions->trans_id}}</span>
                                                    </div>

                                                    <div class="m-widget28__tab-item">
                                                        <span>Reference</span>
                                                        <span>{{$transactions->reference}}</span>
                                                    </div>

                                                    <div class="m-widget28__tab-item">
                                                        <span>Date </span>
                                                        <span>{{$transactions->transaction_date}}</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        @else
                                            <div class="m-widget28__tab tab-content">
                                                <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                                    <div class="m-widget28__tab-items">
                                                        <div class="m-widget28__tab-item">
                                                            <div class="alert alert-danger">No transaction found</div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                        @endif
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
                                                <span class="m--font-accent">₦{{number_format($total_month_saving)}}.00</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total Withdrawals this month</h3>
                                        <div class="m-widget_content-items">

                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span>₦{{$withdrawals}}.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total Failed Transactions this month</h3>
                                        <div class="m-widget_content-items">

                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span>{{count($failed)}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-widget_content">
                                        <h3 class="m-widget_content-title">Total Pending Transactions this month</h3>
                                        <div class="m-widget_content-items">

                                            <div class="m-widget_content-item">
                                                <span>Total</span>
                                                <span>{{count($pending)}}</span>
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