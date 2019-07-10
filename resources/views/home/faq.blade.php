<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>FAQ | Partum Gateway</title>
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

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
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
                        <h3 class="m-subheader__title ">FAQ</h3>
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
                    <div class="col-xl-3">
                        <div class="m-tabs" data-tabs="true" data-tabs-contents="#m_sections">
                            <ul class="m-nav m-nav--active-bg m-nav--active-bg-padding-lg m-nav--font-lg m-nav--font-bold m--margin-bottom-20 m--margin-top-10 m--margin-right-40" id="m_nav" role="tablist">
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item m-tabs__item--active" data-tab-target="#m_section_1" href="#">
                                        <span class="m-nav__link-text">What is Partum GateWay</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_2" href="#">
                                        <span class="m-nav__link-text">How do I start saving on Partum Gateway ?</span>
                                    </a>
                                </li>

                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_3" href="#">
                                        <span class="m-nav__link-text">Is there a service charge I need to know about?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_4" href="#">
                                        <span class="m-nav__link-text">How much can I Save?</span>
                                    </a>
                                </li>

                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-text">Does Partum Gateway have an Office?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_6" href="#">
                                        <span class="m-nav__link-text">How safe is Partum Gateway?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_7" href="#">
                                        <span class="m-nav__link-text">What of my Card details; are they Safe?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_8" href="#">
                                        <span class="m-nav__link-text">How Secure is my Saved Money?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_9" href="#">
                                        <span class="m-nav__link-text">Must I log in to Save every time?</span>
                                    </a>
                                </li>


                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_10" href="#">
                                        <span class="m-nav__link-text">What happens when I missed my scheduled saving daily, weekly or monthly?</span>
                                    </a>
                                </li>

                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_11" href="#">
                                        <span class="m-nav__link-text">I don’t earn much, how much can I really save?</span>
                                    </a>
                                </li>

                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item " data-tab-target="#m_section_12" href="#">
                                        <span class="m-nav__link-text">Can I have multiple accounts for different things?</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="m-tabs-content" id="m_sections">
                            <!--begin::Section 1-->
                            <div class="m-tabs-content__item m-tabs-content__item--active" id="m_section_1">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_1_content">

                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_1_content_1_head" data-toggle="collapse" href="#m_section_1_content_1_body">
                                            <span class="m-accordion__item-title">What is Partum Gateway</span>
                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_1_content_1_body" role="tabpanel" aria-labelledby="m_section_1_content_1_head" data-parent="#m_section_1_content">
                                            <div class="m-accordion__item-content">
                                                <p>
                                                    Derived from the Latin word for Savings (Partum), Partum Gateway is an online savings platform that affords its users the golden opportunity to adequately develop and manage a stable financial life by intuitively growing their savings.<br /><br />
                                                     Partum Gateway helps you stop excessive spending by driving a simple culture of discipline, convenience, and flexibility.

                                                    With Partum Gateway, you are just one more deposit away from your Treasured Future!r finances better and achieve financial freedom.
                                                </p>



                                            </div>
                                        </div>
                                    </div>


                                    <!--end::Item-->
                                </div>
                            </div>
                            <!--begin::Section 1-->


                            <!--begin::Section 2-->
                            <div class="m-tabs-content__item " id="m_section_2">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">To Start Saving on Partum Gateway</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <ul>
                                                    <li>Visit the website www.partumgateway.com</li>
                                                    <li>Activate your free account by making your first savings deposit. (Use a MasterCard, Visa or Verve from any bank in Nigeria). </li>
                                                    <li>Set your withdrawal account</li>
                                                    <li>Then set up your savings plan.</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--begin::Section 2-->

                            <!--begin::Section 3-->
                            <div class="m-tabs-content__item" id="m_section_3">

                                <div class="m-accordion m-accordion--bordered" id="m_section_3_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head" role="tab" id="m_section_3_content_1_head" data-toggle="collapse" href="#m_section_3_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">No hidden charges! It’s completely FREE</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_3_content_1_body" role="tabpanel" aria-labelledby="m_section_3_content_1_head" data-parent="#m_section_3_content">
                                            <div class="m-accordion__item-content">
                                                <p>
                                                     There are no bank charges for deposits as well as withdrawals on the Partum Gateway platform except for withdrawals outside the set dates, which will cost 5% of the withdrawal amount.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->
                                </div>
                            </div>







                            <!--begin::Section 2-->
                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_4">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">How much can I Save?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>You can choose ANY of our sample Savings Plan to start: 
                                                Daily Savings, the range is between<br />
                                                N100 - N20,000<br />
                                                Cash out in one year N36,500-N7.3M<br />
                                                </p>

                                                <p>Weekly Savings, the range is between N1000 - N100,000<br />
                                                Cash out in one year N52,000-N5.2M<br /><br />

                                                Monthly Savings, the range is between N3,000 - N500,000 monthly  Cash out in one year N36,000-N6M<br /><br />

                                                You can add up to N500,000 to any of your savings plan using the Instant-save option which allows you to add more funds to your savings at any time.
                                                </p>




                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--begin::Section 2-->
                            <!--begin::Section 3-->





                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_5">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">Does Partum Gateway have an Office?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                               <p>
                                                   Yes! Our Office Address is at No 10, Akinsanya Street Ojodu, Ikeja, Lagos, Nigeria. Contact Number: +2349015701985<br /><br />
                                                   Email: support.pg@partumgateway.com

                                               </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>






                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_6">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">How safe is Partum Gateway?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    All financial information is encrypted and stored to PCI DSS Level 1 compliant standards. PCI DSS Level 1 compliance is a set of rules stated by credit card companies and audited by an independent third party.   It is the highest possible rating one can get in the electronic payment processing industry. Additionally, all transmission to our banking partner and on our site is via an encrypted 256-bit HTTPS SSL connection.
                                                    <br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>







                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_7">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">What of my Card details; are they Safe?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    •	The security of your funds is our priority. Your card details are extremely safe as they are never stored on the Partum Gateway platform. We work with a PCIDSS-compliant payment processor, Cellulant to handle your card details.
                                                    <br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>





                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_8">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">How Secure is my Saved Money?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    We are in partnership with a Licensed and Leading Payment Processing Company in Africa, Cellulant. <br /><br />

                                                    Partum Gateway is also a registered Fintech company with registration number…….
                                                    <br /><br />
                                                    All saved funds are warehoused with and managed by AIICO Capital, the leading asset management company in Nigeria, registered and licensed by the Securities and Exchange Commission (SEC).
                                                    <br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>






                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_9">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">Must I log in to Save every time?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    No, everything is done automatically except you want to use the Instant-Save option. All transactions on your debit card will be visible in your dashboard.


                                                    <br /><br />
                                                    We will send an email receipt to you every single time you save with your debit card and your bank will also send you an alert. It's 100% secure.

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>





                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_10">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">What happens when I missed my scheduled saving daily, weekly or monthly?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    We WON'T automatically debit your account if you missed any day, week or month and we WON'T charge you either. The Instant-Save option is always available for you to manually make up for any skipped deposit due to insufficient funds,  but besides that, Partum gateway will wait for the next savings deposit cycle.
                                                    <br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>






                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_11">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">I don’t earn much, how much can I really save?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    Partum gateway gives you to make savings deposit as low as N100. Everyone can be part of this culture that works<br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>





                            <div class="m-tabs-content__item m-tabs-content__item--" id="m_section_12">

                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">
                                    <!--begin::Item-->
                                    <div class="m-accordion__item">
                                        <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body">
                                            <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                            <span class="m-accordion__item-title">Can I have multiple accounts for different things?</span>

                                            <span class="m-accordion__item-mode"></span>
                                        </div>
                                        <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content">
                                            <div class="m-accordion__item-content">

                                                <p>
                                                    Oh yes! You can have as many savings packages as you want.<br /><br />


                                                </p>

                                            </div>
                                        </div>
                                    </div>

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
<script src="./assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="./assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->


<!--begin::Page Vendors Scripts -->
<script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors Scripts -->


<!--begin::Page Snippets -->
<script src="./assets/app/js/dashboard.js" type="text/javascript"></script>
<!--end::Page Snippets -->

</body>
<!-- end::Body -->
</html>