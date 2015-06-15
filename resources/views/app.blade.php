<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>SEOshop</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Typekit -->
    <script src="//use.typekit.net/ipv5jrj.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
</head>
<body>

<div id="app" class="container">
    <header class="clearfix">
        @if (Auth::check())
            <nav class="pull-right">
                <ul class="nav nav-pills">
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="{{ Request::is('orders*') ? 'active' : '' }}"><a href="{{ url('orders') }}">Orders</a></li>
                    <li class="{{ Request::is('configuration*') ? 'active' : '' }}"><a href="{{ url('configuration') }}">Configuration</a></li>
                    <li><a href="{{ url('logout') }}">Log out</a></li>
                </ul>
            </nav>
        @endif

        <h3 class="pull-left"><a href="{{ url('dashboard') }}" class="text-muted">Shipping app</a></h3>
    </header>

    @include('flash::message')

    @yield('content')
</div>

<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>