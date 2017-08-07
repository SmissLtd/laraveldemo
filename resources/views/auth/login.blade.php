@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Account</li>
            </ol>
        </div>
    </div>
    <div class="account">
        <div class="container">
            <h2>Account</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="account_grid">
                <div class="col-md-6 login-right">
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <span>Email Address</span>
                        <input type="text" name="email" value="{{ old('email') }}" required="required" /> 

                        <span>Password</span>
                        <input type="password" name="password" required="required" /> 
                        <div class="word-in">
                            <a class="forgot" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            <input type="submit" value="Login">
                        </div>
                    </form>
                </div>	
                <div class="col-md-6 login-left">
                    <h4>NEW CUSTOMERS</h4>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a class="acount-btn" href="{{ route('register') }}">Create an Account</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection