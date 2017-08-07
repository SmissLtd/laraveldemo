@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="register">
            <h2>Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6  register-top-grid">
                    <div class="mation">
                        <span>First Name</span>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"> 

                        <span>Last Name</span>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"> 

                        <span>Email Address</span>
                        <input type="text" name="email" value="{{ old('email') }}"> 
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" col-md-6 register-bottom-grid">

                    <div class="mation">
                        <span>Password</span>
                        <input type="password" name="password">
                        <span>Confirm Password</span>
                        <input type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-sm-12 register-but">
                    <input type="submit" value="submit">
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
