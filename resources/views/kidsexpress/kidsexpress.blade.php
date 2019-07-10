<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>kids Express | Partum Gateway</title>
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


    <link href="https://fonts.googleapis.com/css?family=Butterfly+Kids&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee|Kranky&display=swap" rel="stylesheet">

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
        <div class="m-grid__item m-grid__item--fluid m-wrapper" style="padding-left: 20px;
 background: #FFC122;background-image: url('/images/bk33.jpg');background-size: repeat">


            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto" style="background: white; padding:10px;border-radius: 40px;">
                        <h3 class="m-subheader__title " style="color:#c9315c;font-family: 'Handlee', cursive;">My Kid(s)
                            Express</h3>
                    </div>
                    <div style="padding:10px">
  							<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					Today {{date("D jS, M, Y")}}

				</span>
                    </div>
                </div>

            </div>
            <!-- END: Subheader -->
            <div class="m-content" >

                <!--Begin::Section-->
                <div class="row">
                    @include("alert")




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
                    <div class="col-xl-12" >

                        <div class="row">

                            @if(count($kids) > 0)
                                @foreach($kids as $kid)
                                    <div class="col-xl-4">
                                        <!--begin:: Widgets/Applications/User/Profile3-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--user-profile-3">
                                                    <div class="kt-widget__top">
                                                        <div class="kt-widget__media kt-hidden-" >
                                                            <img src="{{(!empty($kid->image)? $kid->image:
                                                            "/assets/app/media/img/bg/bg-4.jpg")}}"
                                                                 alt="image" style="max-height:
                                                        100px;overflow: hidden">
                                                        </div>
                                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                                            JM
                                                        </div>
                                                        <div class="kt-widget__content">
                                                            <div class="kt-widget__head">
                                                                <a href="#" class="kt-widget__username">
                                                                  {{$kid->title}}
                                                                    <i class="flaticon2-correct"></i>
                                                                </a>


                                                            </div>



                                                            <div class="kt-widget__info">

                                                                <div class="kt-widget__progress">
                                                                    <div class="kt-widget__text">
                                                                        Progress
                                                                    </div>
                                                                    <div class="progress" style="height: 5px;width: 100%;">
                                                                        <div class="progress-bar kt-bg-success" role="progressbar" style="width:  {{($kid->redeemed / $kid->amount) * 100 / 1 }}%;" aria-valuenow="{{($kid->redeemed / $kid->amount) * 100 / 1 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                    <div class="kt-widget__stats">
                                                                        {{($kid->redeemed / $kid->amount) * 100 / 1 }}%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget__bottom">
                                                        <div class="kt-widget__item">
                                                            <div class="kt-widget__icon">
                                                                <i class="flaticon-confetti"></i>
                                                            </div>
                                                            <div class="kt-widget__details">
                                                                <span class="kt-widget__title">Total</span>
                                                                <span class="kt-widget__value"><span>₦</span>
                                                                    {{number_format($kid->amount)}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="kt-widget__item">
                                                            <div class="kt-widget__icon">
                                                                <i class="flaticon-piggy-bank"></i>

                                                            </div>
                                                            <div class="kt-widget__details">
                                                                <span class="kt-widget__title">Redeemed</span>
                                                                <span class="kt-widget__value"><span>₦</span>
                                                                    {{number_format($kid->redeemed)}}</span>
                                                            </div>
                                                        </div>




                                                    </div>

                                                 <br />
                                                    <form action="{{route("creditKidsExpress")}}" method="post"> <div
                                                                align="center"> Manual
                                                            Boost</div>
                                                            <div class="input-group">


                                                                <input type="text" name="amount" class="form-control " id="keywords" placeholder="Enter amount">

                                                                @csrf


                                                                <input type="hidden"
                                                                       class="form-control"
                                                                       placeholder="Enter amount"
                                                                       name="mdlid"
                                                                       value="{{$kid->module_id}}"
                                                                />

                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-dark"><i class="fas fa-send-o">boost</i></button>
                                                                </div>
                                                            </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Applications/User/Profile3-->    </div>

                                @endforeach
                            @endif



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