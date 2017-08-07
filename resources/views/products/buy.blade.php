<?php
/**
 * @param mixed $cart
 */
?>
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
            <h3>Buy</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (!empty($cart['products']) > 0)
                <div class="contact-grids">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center">Total: {{ $cart['count'] }} product(s) on ${{ number_format($cart['total'], 2) }}</h4>
                                <br />
                            </div>
                        </div>
                        <form action="{{ action('ProductController@buy2') }}" method="post">
                            {{ csrf_field() }}
                            <div class="contact-bottom">
                                <div class="col-md-4 in-contact">
                                    <span>Name</span>
                                    <input type="text" name="name" required="required" value="{{ old('name') }}" />
                                </div>
                                <div class="col-md-4 in-contact">
                                    <span>Email</span>
                                    <input type="text" name="email" required="required" value="{{ old('email') }}" />
                                </div>
                                <div class="col-md-4 in-contact">
                                    <span>Phonenumber</span>
                                    <input type="text" name="phone" required="required" value="{{ old('phone') }}" />
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="contact-bottom">
                                <div class="col-md-12 in-contact">
                                    <span>Delivery Address</span>
                                    <input type="text" name="address" required="required" value="{{ old('address') }}" />
                                </div>
                            </div>

                            <div class="contact-bottom-top">
                                <span>Message</span>
                                <textarea name="message">{{ old('message') }}</textarea>
                            </div>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            @else
                Cart is empty
            @endif
        </div>
    </div>
    <script>
        $(".simpleCart_empty").click(function() {
            window.location.reload();
        });
    </script>
@endsection