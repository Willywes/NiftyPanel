<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{  env('INTRANET_NAME', 'Intranet') }} | @yield('title', 'Dashboard')</title>

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/themes/intranet/css/bootstrap.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Themify Icons [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/themes/intranet/css/nifty.min.css" rel="stylesheet">

    <!--SweetAlert [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">

    <!--Toast [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!--Toast [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!--Bootstrap toggle [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/themes/intranet/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
{{--<link href="/themes/intranet/plugins/pace/pace.min.css" rel="stylesheet">--}}
{{--<script src="/themes/intranet/plugins/pace/pace.min.js"></script>--}}


<!--Demo [ DEMONSTRATION ]-->

    @include('intranet.template.components.theme')

    <link href="/themes/intranet/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/themes/intranet/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/themes/intranet/plugins/air_datepicker/datepicker.min.css">

    @yield('styles')

    <style>
        @media (max-width: 500px) {
            .logo-img {
                width: 40%;
            }
        }

        .swal-wide {
            width: 700px !important;
            height: 450px !important;
        }

        .swal2-popup {
            font-size: 1.6rem !important;
        }

        .swal2-icon.swal2-info, .swal2-icon.swal2-question, .swal2-icon.swal2-warning, .swal2-icon.swal2-success {
            font-size: 3.35em !important;
        }

        .swal2-popup .swal2-title {
            margin-top: 20px !important;
        }

        .swal2-popup .swal2-actions {
            margin-top: 40px !important;
        }

        .datepicker--cell.-selected-, .datepicker--cell.-selected-.-current-, .datepicker--cell.-selected-focus-, .datepicker--cell.-focus-, .datepicker--cell.-current-focus- {
            color: #fff !important;
            background: rgb(211, 47, 47) !important;
        }

        .datepicker--cell.-current- {
            color: rgb(211, 47, 47) !important;
        }

        .datepicker--button {
            color: rgb(211, 47, 47) !important;
        }
    </style>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>

@include('intranet.template.components.loading')

<div id="container" class="effect aside-bright mainnav-lg footer-fixed navbar-fixed aside-fixed mainnav-fixed">

    <!--NAVBAR-->
    <!--===================================================-->
@include('intranet.template.layouts.navbar')
<!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                <div class="row">

                    <div class="col-sm-7">
                        <!--Page Title-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div id="page-title">
                            <h1 class="page-header text-overflow">@yield('title', 'Titulo')</h1>
                        </div>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End page title-->


                        <!--Breadcrumb-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <ol class="breadcrumb">
                            <li><a href="{{ route('intranet.dashboard') }}"><i class="demo-pli-home"></i></a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                    <div class="col-sm-5 text-right" style="padding-right: 30px;padding-top: 45px;">
                        @yield('toolbar-buttons')
                    </div>
                </div>


                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->

            </div>
        {{--<div id="page-head">--}}
        {{--<div class="pad-all text-center">--}}
        {{--<h3>Welcome back to the Dashboard.</h3>--}}
        {{--<p>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p>--}}
        {{--</div>--}}
        {{--</div>--}}


        <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                {{--                @include('intranet.template.components._alerts')--}}

                @yield('content')

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->


        <!--ASIDE-->
        <!--===================================================-->

    @include('intranet.template.layouts.aside-container')
    <!--===================================================-->
        <!--END ASIDE-->


        <!--MAIN NAVIGATION-->
        <!--===================================================-->
    @include('intranet.template.layouts.main-nav')
    <!--===================================================-->
        <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
@include('intranet.template.layouts.footer')
<!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="/themes/intranet/js/jquery.min.js"></script>

<!--BootstrapJS [ RECOMMENDED ]-->
<script src="/themes/intranet/js/bootstrap.min.js"></script>

<!--NiftyJS [ RECOMMENDED ]-->
<script src="/themes/intranet/js/nifty.min.js"></script>

<!--Bootbox Modals [ OPTIONAL ]-->
<script src="/themes/intranet/plugins/bootbox/bootbox.min.js"></script>

<!--SweetAlert [ OPTIONAL ]-->
<script src="/themes/intranet/plugins/sweet-alert/sweetalert2.min.js"></script>

<!--Toast [ OPTIONAL ]-->
<script src="/themes/intranet/plugins/toastr/toastr.min.js"></script>

<!--Select 2 [ OPTIONAL ]-->
<script src="/themes/intranet/plugins/select2/js/select2.min.js"></script>


<script src="/themes/intranet/js/globals.js"></script>

<!--Bootstrap table [ OPTIONAL ]-->
<script src="/themes/intranet/plugins/bootstrap-table/bootstrap-table.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-es-CL.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/cookie/bootstrap-table-cookie.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>

<script src="/themes/intranet/plugins/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<script src="/themes/intranet/js/custom.js"></script>

<!--Bootstrap toggle [ OPTIONAL ] ALLWAYS BEFORE BS TABLE -->
<script src="/themes/intranet/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>


{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.select2').select2({--}}
{{--            language: {--}}
{{--                noResults: function (params) {--}}
{{--                    return "No se han encontrado resultados.";--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

<script>
    try {

        jQuery.fn.bootstrapTable.defaults.icons = {
            paginationSwitchDown: 'demo-pli-arrow-down',
            paginationSwitchUp: 'demo-pli-arrow-up',
            refresh: 'demo-pli-repeat-2',
            toggle: 'demo-pli-layout-grid',
            columns: 'demo-pli-check',
            detailOpen: 'demo-psi-add',
            detailClose: 'demo-psi-remove'
        };
    } catch (error) {

    }

</script>


<script>


    $('.btn-theme').click(function(){

        let theme = $(this).data('theme');
        let type = $(this).data('type');

        $('#theme').attr('href', '/themes/intranet/css/themes/type-' + type +'/'+ theme+'.min.css')

    });

    // $('#table-bs').on('page-change.bs.table', function (d) {
    //     try {
    //         preparedChangeStatus();
    //     } catch (e) {
    //         console.log(e);
    //     }
    //     $('.toggle').bootstrapToggle();
    // });
    //
    // $('#table-bs').on('page-change.bs.table', function (d) {
    //     try {
    //         preparedChangeStatus();
    //     } catch (e) {
    //         console.log(e);
    //     }
    //     $('.toggle').bootstrapToggle();
    // });

    // $('#table').on('all.bs.table', function (d) {
    //     try {
    //         preparedChangeStatus();
    //     } catch (e) {
    //         console.log(e);
    //     }
    //     $('.toggle').bootstrapToggle();
    //
    // });

    // $('#table').on('sort.bs.table', function (d) {
    //     try {
    //         preparedChangeStatus();
    //     } catch (e) {
    //         console.log(e);
    //     }
    //     $('.toggle').bootstrapToggle();
    // });

</script>

<script>
    // parche para evitar numebro cientifico input number
    function precise(elem) {
        elem.value = Number(elem.value).toFixed(5);
    }
</script>
<script>

    function pluck(array, key) {
        return array.map(function (obj) {
            return obj[key];
        });
    }

    {{--$(document).ready(function () {--}}
    {{--var type = '{!! auth()->user()->user_type !!}';--}}
    {{--console.log($('.client-hide').length);--}}
    {{--console.log(type);--}}
    {{--if(type == 1){--}}
    {{--$('.client-hide').show();--}}
    {{--}--}}
    {{--});--}}
</script>


@yield('scripts')

<script>
    function removeCookieBS(table) {
        $('#table-bs').bootstrapTable(
            {
                deleteCookie: table
            }
        );
    }
</script>
</body>
</html>
