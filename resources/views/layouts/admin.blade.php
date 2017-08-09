<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Administrative panel</title>
        
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('css/admin.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css' />

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ action('Admin\AdminController@index') }}" style="padding: 0px 15px 0px 0px;">
                        <img alt="Brand" src="{{ asset('images/logo.png') }}" height="50px">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ action('Admin\AdminController@brands') }}">Brands</a></li>
                              <li><a href="{{ action('Admin\AdminController@tags') }}">Tags</a></li>
                              <li><a href="{{ action('Admin\AdminController@categories') }}">Categories</a></li>
                              <li><a href="{{ action('Admin\AdminController@products') }}">Products</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requests<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ action('Admin\AdminController@orders') }}">Orders</a></li>
                              <li><a href="{{ action('Admin\AdminController@contacts') }}">Contacts</a></li>
                              <li><a href="{{ action('Admin\AdminController@newsletters') }}">Newsletters</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ action('Admin\AdminController@users') }}">Users</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ action('Admin\AdminController@settings') }}">Settings</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout({{ Auth::user()->first_name }})
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>
