@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Buy</li>
            </ol>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <h4>Yout order has been successfully saved!</h4>
            <h5>Our manager will contact you shortly.</h5>
        </div>
    </div>
@endsection