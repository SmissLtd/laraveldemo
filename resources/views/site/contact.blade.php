<?php
/**
 * @param string $address
 * @param string $phone
 * @param string $email
 */
?>
@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <h3>Contact</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="contact-grids">
                <div class="contact-form">
                    <form action="{{ action('SiteController@contactSubmit') }}" method="post">
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

                        <div class="contact-bottom-top">
                            <span>Message</span>
                            <textarea  name="message" required="required">{{ old('message') }}</textarea>
                        </div>
                        <input type="submit" value="Send">
                    </form>
                </div>
                <div class="address">
                    <div class=" address-more">
                        <h2>Address</h2>
                        <div class="col-md-4 address-grid">
                            <div>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                <div class="address1">
                                    <p>{{ $address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 address-grid ">
                            <div>
                                <i class="glyphicon glyphicon-phone"></i>
                                <div class="address1">
                                    <p>{{ $phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 address-grid ">
                            <div>
                                <i class="glyphicon glyphicon-envelope"></i>
                                <div class="address1">
                                    <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//content-->
    <!--map-->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279847.2716062404!2d145.46948275!3d-36.60289065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad4314b7e18954f%3A0x5a4efce2be829534!2sVictoria%2C+Australia!5e0!3m2!1sen!2sin!4v1443674224626" width="100%" height="" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
@endsection