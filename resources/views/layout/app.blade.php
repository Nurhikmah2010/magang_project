<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>

    @yield('content')



</body>

</html>
