<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/monthSelect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('simplelineicons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fixedColumns.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs5.css') }}">
    @stack('styles')
</head>

<body>

    @include('layouts.header')

    @yield('content')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/flatpickr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/monthSelect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/summernote.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.fixedColumns.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chartjs-plugin-datalabels.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/summernote-bs5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/anychart-core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/anychart-gantt.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/645e1e723c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/qrcode.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/main.js') }}"></script>
    @yield('script')
</body>
</html>