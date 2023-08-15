<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baltec Inlet & Exhaust Systems (Baltec IES)') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
        	        <ul class="navbar-nav">
        	            <li class="nav-item">
        	                <a class="nav-link" aria-current="page" href="/">Uji coba</a>
        	            </li>
        	            <li class="nav-item">
        	                <a class="nav-link" href="{{ route('products.index') }}">Berhasil</a>
        	            </li>
        	            <li class="nav-item">
        	                <a class="nav-link" href="{{ route('about.index') }}">Log In</a>
        	            </li>
        	            <li class="nav-item">
        	                <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
        	            </li>
        	        </ul>
        	        @endguest
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}"><button class="btn btn-outline-success"
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
            @yield('content')
        </main>
    </div>
</body>

</html>
