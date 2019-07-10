<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Dashboard | Partum Gateway</title>
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
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
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
                        <h3 class="m-subheader__title ">Dashboard</h3>
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

            @include("alert")
                <!--Begin::Section-->

                <div class="kt-portlet">
                    <div class="kt-portlet__body  kt-portlet__body--fit">
                        <div class="row row-no-padding row-col-separator-xl">


                            <div class="col-md-12 col-lg-6 col-xl-4" style="padding:30px;background: #492584; background: url('/assets/app/media/img//bg/bg-4.jpg');background-size: cover">

                                <!--begin::Total Profit-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title" style="color:white">
                                               Instant Savings
                                            </h4>
                                            <span class="kt-widget24__desc">

					        </span>
                                        </div>

                                        <span class="kt-widget24__stats kt-widget24__stats kt-font-warning" >
					        <span><span>₦</span>{{($balance != null ? number_format($balance->balance / 100) : "0")}}.00</span>
					    </span>
                                    </div>

                                    <br />
                                    <div class="kt-widget24__action">

                                             <span data-toggle="modal" data-target="#inssav" class="kt-widget24__number" style="color:white" ><i class="fa fa-info-circle fa-2x"></i>
					    </span>
 <span class="kt-widget24__number" >
       <a href="{{route("showInstantSavings")}}">
       <button class="btn  btn-sm "  style="background: #abb3c4;color:black;">Enter</button></a>
					    </span>

                                    </div>



                                </div>

                                <!--end::Total Profit-->
                            </div>



                            <div class="col-md-12 col-lg-6 col-xl-4" style="padding:30px;background: #492584; background: url('/assets/app/media/img//bg/bg-3.jpg');background-size: cover">

                                <!--begin::New Feedbacks-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title" style="color:white;">
                                                Target Savings
                                            </h4>
                                            <span class="kt-widget24__desc">

					        </span>
                                        </div>

                                        <span class="kt-widget24__stats kt-font-warning">
					       {{(count($targets) != 0 ? count($targets)." target(s)" : "Nil")}}
					    </span>
                                    </div>

                                    <br />
                                    <div class="kt-widget24__action">
                                        <span data-toggle="modal" data-target="#tagsav" class="kt-widget24__number" style="color:white" ><i class="fa fa-info-circle fa-2x"></i>
					    </span>
 <span class="kt-widget24__number" >
       <a href="{{route("showSavingsGoals")}}">
           <button class="btn  btn-sm "  style="background: #c5abb2;color:black;">Enter</button>
       </a>
					    </span>

                                    </div>




                                </div>
                                <!--end::New Feedbacks-->

                            </div>



                            <div class="col-md-12 col-lg-6 col-xl-4" style="padding:30px;background: #492584; background: url('/assets/app/media/img//bg/bg-5.jpg');background-size: cover">

                                <!--begin::New Orders-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title" style="color:white;">
                                               Fixed Lock
                                            </h4>

                                        </div>

                                        <span class="kt-widget24__stats kt-widget24__stats kt-font-warning">
					        <span><span>₦</span>{{($fixedlock != null ? number_format
                                            ($fixedlock->amount
                                             / 100) : "0")}}.00</span>
					    </span>
                                    </div>


                                    <br />
                                    <div class="kt-widget24__action">
                                         <span data-toggle="modal" data-target="#exampleModalLong" class="kt-widget24__number" style="color:white" ><i class="fa fa-info-circle fa-2x"></i>
					    </span>
 <span class="kt-widget24__number" >
     <a href="{{route("showFixedLock")}}"><button class="btn  btn-sm "  style="background: #c5abc5;color:black;">Enter</button></a>
					    </span>

                                    </div>
                                </div>
                                <!--end::New Orders-->

                            </div>

                            <div class="col-md-12 col-lg-6 col-xl-4" style="margin-top:1px;padding:30px;background: #492584; background: url('/assets/app/media/img//bg/bg-3.jpg');background-size: cover">

                                <!--begin::New Feedbacks-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title" style="color:white;">
                                                Kids Express
                                            </h4>
                                            <span class="kt-widget24__desc">

					        </span>
                                        </div>

                                        <span class="kt-widget24__stats kt-font-warning">
					       {{(count($kids) != 0 ? count($kids)." kid(s)" : "Nil")}}
					    </span>
                                    </div>

                                    <br />
                                    <div class="kt-widget24__action">
                                        <span data-toggle="modal" data-target="#kids" class="kt-widget24__number" style="color:white" ><i class="fa fa-info-circle fa-2x"></i>
					    </span>
                                        <span class="kt-widget24__number" >
       <a href="{{route("showViewKidsExpress")}}">
           <button class="btn  btn-sm "  style="background: #c5abb2;color:black;">Enter</button>
       </a>
					    </span>

                                    </div>




                                </div>
                                <!--end::New Feedbacks-->

                            </div>



                            <div class="col-md-12 col-lg-6 col-xl-4" style="margin-top:1px;padding:30px;background:
                            #492584; background: url('/assets/app/media/img//bg/bg-6.jpg');background-size: cover">
                                <a href="#">
                                <!--begin::New Users-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title" style="color:white;">
                                              Gather Lock
                                            </h4>

                                        </div>



                                        <span class="kt-widget24__stats kt-font-warning">
					       Nil
					    </span>



                                    </div>



                                    <br />
                                    <div class="kt-widget24__action ">
<span data-toggle="modal" data-target="#gatlock" class="kt-widget24__number" style="color:white" ><i class="fa fa-info-circle fa-2x"></i>
					    </span>
                                        <span class="kt-widget24__number" >
                                            <a href="#"><button class="btn  btn-sm " disabled style="background: white;color:black;">Enter</button></a>
					    </span>
                                    </div>
                                </div>
                                <!--end::New Users-->


                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">








                    <div class="col-xl-12">
                        <br />

                        <h4 class="m-subheader__title " style="color:#3f4047;">Recent Transactions</h4><br />
                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height
                            m-portlet--rounded-force table-responsive" style="margin-bottom: 0px; !important;">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Type</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(count($transactions) > 0)
                                <?php $x = 1;?>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td class="m-datatable__cell--sorted
                                        m-datatable__cell">{{number_format($transaction->amount/100)}}</td>
                                        <td>{{$transaction->reference}}</td>
                                        <td>{{$transaction->created_at->diffForHumans()}}</td>
                                        <td> @if($transaction->status == "success")
                                                <span style="width: 100px;">
                                                                <span class="m-badge  m-badge--success m-badge--wide">{{$transaction->status}}</span>
                                                            </span>
                                            @elseif($transaction->status == "pending")
                                                <span style="width: 100px;">
                                                                <span class="m-badge  m-badge--warning m-badge--wide">{{$transaction->status}}</span>
                                                            </span>
                                            @else
                                                <span style="width: 100px;">
                                                                <span class="m-badge  m-badge--danger m-badge--wide">{{$transaction->status}}</span>
                                                            </span>
                                            @endif</td>
                                        <td>
                                               @if($transaction->product == "IS")
                                                Instant Savings
                                                @endif
                                                @if($transaction->product == "FL")
                                                   Fixed Lock
                                                @endif
                                                @if($transaction->product == "KE")
                                                    Kids Express
                                                @endif
                                        </td>
                                        <td>{{$transaction->trans_type}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-info">No transaction found</div>
                            @endif
                            </tbody>
                        </table>
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

    <div class="row">


        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">



                <div class="table-responsive">

                </div>


            </div>  </div>
    </div>
    <!-- end:: Body -->

@include("inc.modal")


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