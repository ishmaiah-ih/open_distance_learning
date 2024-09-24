

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="backend/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="backend/assets/img/favicon.png">
    <title>@yield('title', 'E-hub')</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="../../backend/assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="../../backend/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../backend/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="../../backend/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
{{--    @vite('resources/css/app.css')--}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

{{--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">--}}
{{--databales--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
</head>

<body class="g-sidenav-show  bg-gray-100">



@include('admin.includes.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!----><?php //include 'navbar.php' ?><!---->
    @include('admin.includes.navbar')



    <div class="container-fluid py-4">
        <div class="">
            @yield('content')
        </div>
    </div>




@include('admin.includes.footer')
