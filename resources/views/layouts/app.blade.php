<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Baltec Inlet & Exhaust Systems (Baltec IES)') }}</title> --}}
    <title>Baltec Inlet & Exhaust Systems (Baltec IES)</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="https://baltecies.com.au/dashboard/wp-content/themes/bootstrapwp/img/baltec-ies-logo.png"
        type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="https://baltecies.com.au/dashboard/wp-content/themes/bootstrapwp/img/baltec-ies-logo.png"
                        alt="Bootstrap" width="100">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @guest
                        @if (Route::has('login'))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about.index') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                                </li>
                            </ul>
                        @endif
                    @else
                        @if (Auth::user() && Auth::user()->is_admin == 1)
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.index') }}">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project.index') }}">Project</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.index') }}">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project.index') }}">Project</a>
                                </li>
                            </ul>
                        @endif
                    @endguest
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}"><button class="btn btn-block btn-outline-primary"
                                        type="">Login</button></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('editProfile.edit',Auth::user()->id) }}">Edit Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
