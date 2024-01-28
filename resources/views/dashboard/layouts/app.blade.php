<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from omah.dexignzone.com/laravel/demo/index by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 09:01:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laravel | Dashboard</title>

    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">




    <link href="{{asset("/dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css")}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset("/dashboard/vendor/jqvmap/css/jqvmap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("/dashboard/vendor/chartist/css/chartist.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet" type="text/css" />
    <link href="{{asset("/dashboard/vendor/owl-carousel/owl.carousel.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("/dashboard/css/style.css")}}" rel="stylesheet" type="text/css" />



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('dashboard.layouts.navigation.header')
        @include('dashboard.layouts.navigation.sidebar')

        @yield('contents')

        @include('dashboard.layouts.footer')

    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset("/dashboard/vendor/global/global.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("/dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js")}}" type="text/javascript">
    </script>
    <script src="{{asset("/dashboard/vendor/chart.js/Chart.bundle.min.js")}}" type="text/javascript"></script>
    <script src="{{asset(/dashboard/vendor/apexchart/apexchart.js)}}" type="text/javascript"></script>
    <script src="{{asset(/dashboard/vendor/owl-carousel/owl.carousel.js)}}" type="text/javascript"></script>
    <script src="{{asset("/dashboard/vendor/jqvmap/js/jquery.vmap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset(/dashboard/vendor/jqvmap/js/jquery.vmap.world.js)}}" type="text/javascript"></script>
    <script src="{{asset("/dashboard/vendor/peity/jquery.peity.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("/js/dashboard/dashboard-1.js")}}" type="text/javascript"></script>
    <script src="{{asset("/js/custom.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("/js/deznav-init.js")}}" type="text/javascript"></script>
    <!--		<script src="//omah.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript">
    </script>
   <script src="//omah.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript">
   </script> -->
    <!--
 -->
</body>

<!-- Mirrored from omah.dexignzone.com/laravel/demo/index by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 09:02:34 GMT -->

</html>