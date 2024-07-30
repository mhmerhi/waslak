<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst(config('app.name', 'Laravel')) }}</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('/images/favicons') }}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('/images/favicons') }}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/images/favicons') }}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/images/favicons') }}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/images/favicons') }}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('/images/favicons') }}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('/images/favicons') }}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('/images/favicons') }}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/images/favicons') }}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('/images/favicons') }}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/images/favicons') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('/images/favicons') }}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/images/favicons') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ url('/images/favicons') }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('/images/favicons') }}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"  rel="stylesheet" type="text/css">
    <link href="{{ url('/css/app.css') }}"  rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="app" class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h3><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" style="width: 60%"/></a></h3>
            <strong><a href="{{ url('/') }}" class="logo-text">Waslak</a></strong>
        </div>


        <ul class="list-unstyled components">
            <li class="nav-item{{ request()->routeIs('clients.index', 'clients.create', 'clients.edit', 'clients.show') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('clients.index') }}"><i class="fa fa-user"></i> Clients</a>
            </li>
            <li class="nav-item{{ request()->routeIs('drivers.index', 'drivers.create', 'drivers.edit', 'drivers.show') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('drivers.index') }}"><i class="fa fa-motorcycle"></i> Drivers</a>
            </li>
            <li class="nav-item {{ request()->routeIs('orders.index', 'orders.create', 'orders.show', 'orders.edit', 'orders.unpaid') ? 'active' : '' }}">
                <a href="#orderSubmenu" id="toggle-orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-archive"></i>Orders</a>
                <ul class="collapse list-unstyled{{ request()->routeIs('orders.index', 'orders.create', 'orders.show', 'orders.edit', 'orders.unpaid') ? ' show' : '' }}" id="orderSubmenu">
                    <li>
                        <a class="nav-link{{ request()->routeIs('orders.index') ? ' active' : '' }}" href="{{ route('orders.index') }}"><i class="fa fa-archive"></i> All</a>
                    </li>
                    <li>
                        <a class="nav-link{{ request()->routeIs('orders.unpaid') ? ' active' : '' }}" href="{{ route('orders.unpaid') }}"><i class="fa fa-archive"></i> Unpaid</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <i id="sidebarCollapse" class="fa fa-bars"></i>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.edit', ['id' => Auth::user()->id]) }}">Edit Account</a>
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="col-md-12 ms-sm-auto px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </main>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.js-datatable').DataTable();

        $('#toggle-orders').click(function(e) {
            e.preventDefault();
            $('#orderSubmenu').collapse('toggle');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
</body>
</html>
