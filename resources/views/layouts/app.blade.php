<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Icon app -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo_ITTI.ico') }}" />

    <!-- plugins -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    @yield('css')

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- third party css end -->

</head>

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>


    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('components.header')
        <!-- End Topbar Start -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('components.sidebar')
        <!-- ========== End Left Sidebar Start ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page Content here -->
        <!-- ============================================================== -->
        @include('components.footer')
    </div>
    <!-- End Page Wrapper -->

    <!-- Right Sidebar -->
    @include('components.right-sidebar')
    <!-- End Right Sidebar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Scroll to Top Button-->
    {{-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> --}}


    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    @yield('scripts')

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- optional plugins -->
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>  -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page js -->
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Date Range -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- third party js ends -->


    <!-- Flasher Toastr -->
    @flasher_render

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>

</html>
