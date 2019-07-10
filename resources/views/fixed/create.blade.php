<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Create Goals | Partum Gateway</title>
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
    <script src="/js/coinStackBarv0-7.js"></script>

    <script type="text/javascript">
        window.requestAnimFrame = (function(callback){
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function(callback){
                    window.setTimeout(callback, 1000 / 60);
                };
        })();


        //The following functions are only to test the CoinStackBar object

        function setup(){
            if(!document.createElement('svg').getAttributeNS){
                var coinimg = ['bitcoin.png','bitcoin-silver.png','bitcoin-copper.png'];//'bitcoin.png';//['bitcoin.png','bitcoin-silver.png','bitcoin-copper.png'];
            }else{
                coinimg = ['bitcoin.svg', 'bitcoin-silver.svg', 'bitcoin-copper.svg'];//'bitcoin.svg';//['bitcoin.svg', 'bitcoin-silver.svg', 'bitcoin-copper.svg'];
            }


            //cs  = new CoinStackBar(document.getElementById("CoinStackBar"),coinimg, 200,100, 30, 0, 100, 0,  50, 5, 2,50,500, 1 , false,300);
            cs = new CoinStackBar({
                container:document.getElementById("CoinStackBar"),
                coinimgsrc:coinimg,
                coinimgwidth:200,
                coinimgheight:100,
                coinheight:30,
                xoffset:10,
                yoffset:6,

                startvalue:0,
                maxstackheight:30,
                containerwidth:50,
                containerheight:500,

            });


            requestAnimFrame(test);
        }
        test = function(){
            document.getElementById('CoinStackBar').CoinStackBar.setValue(50+50*Math.sin(Date.now()/3000));
            //document.getElementById('CoinStackBar').CoinStackBar.setValue(0);

            requestAnimFrame(test);
        }
    </script>

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
                        <h3 class="m-subheader__title ">Create Savings Goal</h3>
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
                    <div class="col-xl-5">
                        <div class="m-portlet m-portlet--full-height  ">
                            <div class="m-portlet__body">

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">


                                    <li class="m-nav__item">

                                        <form method="post" style="padding:30px" enctype="multipart/form-data">
                                            @csrf
                                            <label>
                                             Title
                                            </label>

                                            <input class="form-control" type="text" name="title" />
                                            <br />

                                            <label>  Amount</label>

                                            <input class="form-control" type="number" id="amount" name="amount" />
                                            <br />

                                            <label>    Duration</label>

                                            <select name="duration" id="duration" class="form-control">
                                                <option value=""> Select Duration</option>

                                                    @for($x = 1;$x <= 48;$x++)

                                                        @if($x ==1)
                                                        <option value="{{$x}}"> {{$x}} Month</option>
                                                        @else
                                                            <option value="{{$x}}"> {{$x}} Months</option>
                                                        @endif
                                                    @endfor

                                            </select>
                                            <br />



                                            <label> Billing Type</label>
                                            <select name="type" class="form-control" id="billing_type">
                                                <option value=""> Select Billing type</option>

                                                <option value="Daily"> Daily</option>
                                                <option value="Monthly"> Monthly</option>
                                            </select>



                                            <br />

                                            <label>  Quota <small>Amount daily or monthly</small></label>
                                            <input class="form-control" type="text" id="quota" name="quota" />

                                            <br />

                                            <div class="form-group">
                                                <label>   <i class="m-nav__link-icon flaticon-time-3"></i> Image</label>
                                                <input type="file" name="image" class="form-control" />
                                            </div>

                                            <button class="btn btn-danger" type="submit">Submit</button>

                                        </form>

                                    </li>


                                </ul>

                                <div class="m-portlet__body-separator"></div>


                            </div>
                        </div>
                    </div>

                    <style>
                        .m-widget27 .m-widget27__pic:before {
                            content: '';
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            background: none !important;
                            background: none !important;
                            opacity: 0.6;
                        }
                    </style>
                    <div class="col-xl-7">

                        <div class="row">




                                    <div class="col-xl-8">
                                        <!--begin:: Widgets/Blog-->
                                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force" id="cal_div" style="display: none;">
                                            <div class="m-portlet__head m-portlet__head--fit-">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">

                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="m-portlet__nav">

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="m-portlet__body">
                                                <div class="m-widget27 m-portlet-fit--sides">

                                                    <div class="m-widget27__container" style="margin-top: 0px;">



                                                        <div class="m-widget27__tab tab-content m-widget27--no-padding">

                                                            <div id="m_personal_income_quater_1" class="tab-pane active">
                                                                <div class="row  align-items-center">
                                                                    <div class="col-md-12">
                                                                        <!--begin::Total Profit-->
                                                                        <div class="m-widget24">
                                                                            <div class="m-widget24__item" align="center">


                                                                                <div id="result_cal">



                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        <!--end::Total Profit-->


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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>


    var amount,duration,solutMonth,solutDay ="";


    $("#duration").change(function() {

         amount = document.getElementById('amount').value;
         duration = $(this).children("option:selected").val();

         solutMonth = parseInt(amount) / parseInt(duration);
         solutDay = solutMonth / 31;

        if(duration > 1){
            $("#result_cal").html("<div class='alert alert-info'>From our calculations if you save <strong>N"+Math.ceil
                (solutDay)
                +"" + " daily</strong>  or if you decide to save <strong>N"+Math.ceil(solutMonth)+" " +
                "monthly</strong> you will achieve this target in <strong>"+duration+" months</strong>  </div>");

            $("#cal_div").show(500);
        } else if(duration < 2){
            $("#result_cal").html("<div class='alert alert-info'>Well... if you save <br/><strong>N"+Math.ceil(solutDay)+" daily</strong><br />  you will achieve this target in" +
                " " +
                "<br /><strong>"+duration+" month</strong></div>");

            $("#cal_div").show(500);
        }



        $("#billing_type").change(function() {
            var billing_type = $(this).children("option:selected").val();
            if(billing_type == "Daily"){
                $("#quota").attr("value",Math.ceil(solutDay))
            }else if(billing_type == "Monthly"){
                $("#quota").attr("value",Math.ceil(solutMonth))
            }

        });





    });

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