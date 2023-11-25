<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{asset('back_office/images/favicon_1.ico')}}">
    <title>Moltran - @yield('title')</title>


    <link href="{{asset('back_office/css/bootstrap.min.css')}}" rel="stylesheet" />


    <link href="{{asset('back_office/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('back_office/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('back_office/css/material-design-iconic-font.min.css')}}" rel="stylesheet">


    <link href="{{asset('back_office/css/animate.css')}}" rel="stylesheet" />


    <link href="{{asset('back_office/css/waves-effect.css')}}" rel="stylesheet">


    <link href="{{asset('back_office/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">


    <link href="{{asset('back_office/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('back_office/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @stack('admin.style')
    <script src="{{asset('back_office/js/modernizr.min.js')}}"></script>

</head>



<body class="fixed-left">
@include('sweetalert::alert')

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    @include('back_office.layout.header')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('back_office.layout.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">@yield('title')</li>
                        </ol>
                    </div>
                </div>

                @yield('dashboard.content')

            </div> <!-- container -->

        </div> <!-- content -->

       @include('back_office.layout.footer')

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('back_office/js/jquery.min.js')}}"></script>
<script src="{{asset('back_office/js/bootstrap.min.js')}}"></script>
<script src="{{asset('back_office/js/waves.js')}}"></script>
<script src="{{asset('back_office/js/wow.min.js')}}"></script>
<script src="{{asset('back_office/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('back_office/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('back_office/assets/chat/moment-2.2.1.js')}}"></script>
<script src="{{asset('back_office/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('back_office/assets/jquery-detectmobile/detect.js')}}"></script>
<script src="{{asset('back_office/assets/fastclick/fastclick.js')}}"></script>
<script src="{{asset('back_office/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('back_office/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

<!-- sweet alerts -->
<script src="{{asset('back_office/assets/sweet-alert/sweet-alert.min.js')}}"></script>
<script src="{{asset('back_office/assets/sweet-alert/sweet-alert.init.js')}}"></script>

<!-- flot Chart -->
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{asset('back_office/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

<!-- Counter-up -->
<script src="{{asset('back_office/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('back_office/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('back_office/js/jquery.app.js')}}"></script>

<!-- Dashboard -->
<script src="{{asset('back_office/js/jquery.dashboard.js')}}"></script>

<!-- Chat -->
<script src="{{asset('back_office/js/jquery.chat.js')}}"></script>

<!-- Todo -->
<script src="{{asset('back_office/js/jquery.todo.js')}}"></script>

<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>

<!-- Examples -->
<script src="{{asset("back_office/assets/magnific-popup/magnific-popup.js")}}"></script>
<script src="{{asset("back_office/assets/jquery-datatables-editable/jquery.dataTables.js")}}"></script>
<script src="{{asset("back_office/assets/datatables/dataTables.bootstrap.js")}}"></script>
<script src="{{asset("back_office/assets/jquery-datatables-editable/datatables.editable.init.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('admin.script')
</body>
</html>
