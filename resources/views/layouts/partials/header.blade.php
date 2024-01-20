<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }} - {{ $pageTitle ?? '' }} </title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- font family -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- full calender -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css" rel="stylesheet" />
    <!-- dashboard css -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/custome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <!-- fav icon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    <!-- toast -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">

{{--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" /> --}}


    <!-- Include Bootstrap CSS -->

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    @stack('styles')
</head>
