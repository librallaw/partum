<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Fixed Savings | Partum Gateway</title>
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
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>


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
                        <h3 class="m-subheader__title ">Fixed Lock</h3>
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





                    @if($balance == null)

                        <div class="col-xl-5">
                            <!--begin:: Widgets/Blog-->
                            <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                                <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                                    <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="min-height: 300px; background-image: url(/assets/images/fixed.png)">
                                        <h3 class="kt-widget19__title kt-font-light">
                                            About this product
                                        </h3>
                                        <div class="kt-widget19__shadow"></div>

                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <div class="kt-widget19__wrapper">

                                        <div class="kt-widget19__info" style="font-size: 22px;line-height: 101%;
                                        color:black;text-align: center">

                                            If you’ve got a chunk of money that you won’t need for a while, lock it away in a fixed term and watch your savings grow


                                        </div><br />
                                        <div class="kt-widget19__info">
                                            <h4 class="kt-widget19__number kt-font-brand" style="color: #ff9000
                                          !important;"><span class="fa fa-info-circle" style="color:#011f45"></span>
                                                Know
                                                what you'll
                                                earn</h4>
                                            <p style="color: black;">You could earn between 1% and 5% AER The rate of
                                                interest
                                                you earn is
                                                fixed, so you will know exactly how much you’re getting,</p>
                                            <h4 class="kt-widget19__number kt-font-brand" style="color: #ff9000 !important;"><span class="fa fa-info-circle" style="color:#011f45"></span>  A home for your lump
                                                sum</h4>

                                            <p style="color: black;"> A home for your lump sum Got money you won’t need for a while! Get a
                                                better rate of interest than instant savings</p>

                                            <h4 class="kt-widget19__number kt-font-brand" style="color: #ff9000 !important;"><span class="fa fa-info-circle" style="color:#011f45"></span> Your Savings, Your
                                                choice</h4>
                                            <p style="color: black;">Choose how long you want to put your money away for 3 months, 6
                                                months, 1 year or 18 months or more</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end:: Widgets/Blog-->    </div>

                    @endif

                    <div class="col-xl-4">

                        <!--begin:: Widgets/Blog-->
                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                            <div class="m-portlet__head m-portlet__head--fit-">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            Fixed Savings
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">

                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="m-widget27 m-portlet-fit--sides">
                                    <div class="m-widget27__pic" style="">
                                        <img src="/assets/app/media/img//bg/bg-4.jpg" alt="">
                                        <h3 class="m-widget27__title m--font-light">
                                            <span><span>₦</span>{{($balance != null ? number_format($balance->amount
                                            / 100
                                            ) : "0")}}.00</span>
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



                                        <!-- end::Nav pills -->


                                        <!-- begin::Tab Content -->
                                        <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                            <div id="m_personal_income_quater_1" class="tab-pane active">



                                                <div class="row  align-items-center">
                                                    <div class="col">

                                                        <div class="m-widget28">

                                                            <div class="m-widget28__container">
                                                                <!-- begin::Nav pills -->



                                                                @if($balance != null)


                                                                    <div class="m-widget28__tab tab-content">
                                                                        <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                                                            <div class="m-widget28__tab-items">
                                                                                <div class="m-widget28__tab-item">
                                                                                    <span>Deposit Date </span>
                                                                                    <span>{{date('D, jS M, Y',$balance->unix_time)
                                                }}</span>
                                                                                </div>
                                                                                <div class="m-widget28__tab-item">
                                                                                    <span>Duration</span>
                                                                                    <span>{{$balance->duration}} month(s)</span>
                                                                                </div>
                                                                                <div class="m-widget28__tab-item">
                                                                                    <span>End Date </span>
                                                                                    <span>{{$balance->due_date}}</span>
                                                                                </div>


                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                @endif

                                                            <!-- end::Tab Content -->
                                                            </div>
                                                        </div>





                                                        @if($balance == null)


                                                            <form action="{{route('creditFixed')}}" method="post">
                                                                Add to your Fixed Account <br />
                                                                <div class="form-group">
                                                                    @csrf

                                                                    <br /><label>Duration</label>
                                                                    <select  name="duration" class="form-control" required>
                                                                        <option value="3">3 Months</option>
                                                                        <option value="6">6 Months</option>
                                                                        <option value="12">12 Months</option>
                                                                    </select><br />

                                                                    <label>Amount</label>
                                                                    <input type="number" name="amount" class="form-control"
                                                                           placeholder="Enter amount" required
                                                                    />
                                                                </div>

                                                                <button class="btn btn-info" type="submit">Submit</button>
                                                            </form>

                                                        @endif
                                                        @if($balance != null)

                                                        @if($balance->amount == 0)
                                                            <form action="{{route('creditFixed')}}" method="post">
                                                                Add to your Fixed Account <br />
                                                                <div class="form-group">
                                                                    @csrf

                                                                    <br /><label>Duration</label>
                                                                    <select  name="duration" class="form-control" required>
                                                                        <option value="3">3 Months</option>
                                                                        <option value="6">6 Months</option>
                                                                        <option value="12">12 Months</option>
                                                                    </select><br />

                                                                    <label>Amount</label>
                                                                    <input type="number" name="amount" class="form-control"
                                                                           placeholder="Enter amount" required
                                                                    />
                                                                </div>

                                                                <button class="btn btn-info" type="submit">Submit</button>
                                                            </form>
                                                        @endif
                                                        @endif



                                                    </div>

                                                </div>
                                            </div>
                                            <div id="m_personal_income_quater_2" class="tab-pane fade">
                                                <div class="row  align-items-center">



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


                    @if($balance != null)
                    @if($balance->amount > 0)
                    <div class="col-xl-4">
                        <!--begin:: Widgets/Blog-->
                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            Deposit Details
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">

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
                                                                class="fa
                                                                flaticon-pie-chart"></i></span><span>Deposit Details
                                                        </span></a>
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

                        @endif
                        @endif












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