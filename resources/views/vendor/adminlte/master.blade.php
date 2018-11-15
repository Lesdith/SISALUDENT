<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
     <!-- Bootstrap jasny -->
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/bootstrap/jasny/jasny-bootstrap.min.css') }}">
    <!-- Jquery inputmask -->
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/jquery/dist/inputmask.min.css') }}">
    <!-- Jquery Smoke -->
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/jquery/dist/smoke.min.css') }}">
    <!-- Bootstrap Wisyhtml5 -->
    <link rel="stylesheet"  href="{{ asset('vendor/adminlte/vendor/bootstrap/wysi/bootstrap-wysihtml5.css') }}">
    <!-- Bootstrap datetimepicker -->
    <link rel="stylesheet"  media="screen"  href="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet"  media="screen"  href="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/daterangepicker.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    <!-- sweetalert -->
    <!-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert2.min.css') }}"> -->
    <!-- <link href="https://libraries.cdnhttps.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"> -->

   @if(config('adminlte.plugins.fullcalendar'))
        <!-- Fullcalendar -->
    <link rel="stylesheet" type="text/css"  media="print" href="{{ asset('vendor/adminlte/vendor/fullcalendar/fullcalendar.print.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/vendor/fullcalendar/fullcalendar.min.css') }}" >
    <link rel="stylesheet" htype="text/css" ref="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/jquery-ui.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/theme.css') }}" >

    @endif

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css"> -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/jquery.dataTables.min.css') }}">
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/responsive.dataTables.min.css') }}">
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"> -->
    @endif

     @if(config('adminlte.plugins.toastr'))
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/toastr/toastr.min.css') }}">
    @endif

     @if(config('adminlte.plugins.sweetalert'))
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert2.min.css') }}">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/datatables/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/knockout-min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery-bootstrap-modal-steps.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/wysi/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/riot/riot.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/riot/riot-compiler.js') }}"></script>



<!-- Boostrap jasny -->
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

 @if(config('adminlte.plugins.fullcalendar'))
        <!-- Fullcalendar -->
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/jquery-ui.min.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/smoke.min.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/es.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/moment.js') }}" ></script>
    <!-- <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/moment-with-locales.js') }}" ></script> -->
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/moment-timezone.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/moment-timezone-with-data.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/lib/moment-timezone-with-data-2012-2022.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/fullcalendar.min.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/locale/es.js') }}" ></script>
@endif

<script src="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<!-- <script src="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/bootstrap-datetimepicker.es.js') }}"></script> -->
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/datetimepicker/knockout-3.2.0.js') }}"></script>

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="{{ asset('vendor/adminlte/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/dataTables.responsive.min.js') }}"></script>
@endif


@if(config('adminlte.plugins.prism'))
<script src="{{ asset('vendor/adminlte/vendor/prism/prism.js') }}"></script>
@endif

@if(config('adminlte.plugins.flat'))
<script src="{{ asset('vendor/adminlte/vendor/flat/flat.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/flat/aplication.js') }}"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

  @if(config('adminlte.plugins.toastr'))
        <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/toastr/toastr.min.js') }}" ></script>
    @endif

  @if(config('adminlte.plugins.sweetalert'))
        <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert2.min.js') }}"></script>
    @endif

@yield('adminlte_js')

</body>
</html>
