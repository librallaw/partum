<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Partum Gateway | Dashboard</title>
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
                        <h3 class="m-subheader__title ">Transactions</h3>
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


                    <div class="col-xl-12">
                        <div class="m-portlet m-portlet--mobile ">

                            <div class="m-portlet__body">
                                <!--begin: Datatable -->
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
                                     id="m_datatable_latest_orders" style="">
                                    <table class="m-datatable__table table-bordered"
                                           style="display: block; min-height: 300px; max-height: 600px;overflow:scroll;overflow-x: hidden">
                                        <thead class="m-datatable__head">
                                        <tr class="m-datatable__row" style="left: 0px;">
                                            <th data-field="RecordID"
                                                class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                                <span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox"><span></span></label></span></th>
                                            <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort"
                                                data-sort="asc"><span style="width: 150px;">Transaction ID<i
                                                            class="la la-arrow-up"></i></span></th>
                                            <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 150px;">Reference</span></th>
                                            <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 121px;">Date </span></th>
                                            <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 100px;">Status</span></th>
                                            <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 100px;">Type</span></th>

                                        </tr>
                                        </thead>
                                        <tbody class="m-datatable__body ps ps--active-y">
                                        <tr data-row="340" class="m-datatable__row" style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="98"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">69190-111 - JP</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--success m-badge--wide">Success</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-success">Credit</span></span>
                                            </td>

                                        </tr><tr data-row="340" class="m-datatable__row" style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="98"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">69190-111 - JP</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--success m-badge--wide">Success</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-success">Credit</span></span>
                                            </td>

                                        </tr>

                                        <tr data-row="341" class="m-datatable__row m-datatable__row--even"
                                            style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="43"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">75862-001 - ID</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--metal m-badge--wide">Pending</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-danger">Debit</span></span>
                                            </td>

                                        </tr>
                                        <tr data-row="342" class="m-datatable__row" style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="122"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">76088-300 - SO</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--success m-badge--wide">Pending</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-success">Credit</span></span>
                                            </td>

                                        </tr>
                                        <tr data-row="343" class="m-datatable__row m-datatable__row--even"
                                            style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="80"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">76159-001 - PL</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--danger m-badge--wide">Canceled</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-danger">Debit</span></span>
                                            </td>

                                        </tr>
                                        <tr data-row="344" class="m-datatable__row" style="left: 0px;">
                                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                                data-field="RecordID"><span style="width: 40px;"><label
                                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                                type="checkbox" value="340"><span></span></label></span>
                                            </td>
                                            <td class="m-datatable__cell--sorted m-datatable__cell"
                                                data-field="OrderID"><span style="width: 150px;">76323-001 - CN</span>
                                            </td>
                                            <td data-field="ShipName" class="m-datatable__cell"><span
                                                        style="width: 150px;">69190-111 - JP</span></td>
                                            <td data-field="ShipDate" class="m-datatable__cell"><span
                                                        style="width: 121px;">2018-08-02T06:45:25</span></td>
                                            <td data-field="Status" class="m-datatable__cell"><span
                                                        style="width: 100px;"><span
                                                            class="m-badge  m-badge--danger m-badge--wide">Canceled</span></span>
                                            </td>
                                            <td data-field="Type" class="m-datatable__cell"><span style="width: 100px;">&nbsp;<span
                                                            class="m--font-bold m--font-danger">Debit</span></span>
                                            </td>

                                        </tr>





                                        <div class="ps__rail-x" style="left: 0px; bottom: -90px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 90px; height: 325px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0"
                                                 style="top: 52px; height: 188px;"></div>
                                        </div>
                                        </tbody>
                                    </table>

                                </div>
                                <!--end: Datatable -->
                            </div>
                        </div>  </div>
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