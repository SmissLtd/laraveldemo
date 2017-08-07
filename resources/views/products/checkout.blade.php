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
                <li class="active">Checkout</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="check-out">
            <h2>Checkout</h2>
            @if (!empty($cart['products']))
                <form method="post" action="{{ action('ProductController@buy') }}">
                    {{ csrf_field()}}
                    <table >
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>		
                            <th>Prices</th>
                            <th>Delivery details</th>
                            <th>Sub total</th>
                        </tr>
                        @foreach ($cart['products'] as $product)
                            <tr>
                                <td class="ring-in">
                                    <a href="{{ action('ProductController@product', ['id' => $product['product']->id]) }}" class="at-in">
                                        <img src="{{ asset('images/' . $product['product']->photo) }}" class="img-responsive" alt="">
                                    </a>
                                    <div class="sed">
                                        <h5>{{ $product['product']->name_long }}</h5>
                                        <p>{{ $product['product']->description }}</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </td>
                                <td class="check">
                                    <input type="text" name="product[{{ $product['product']->id }}]" value="{{ $product['count'] }}">
                                </td>		
                                <td>${{ number_format($product['price'], 2) }}</td>
                                <td>FREE SHIPPING</td>
                                <td>${{ number_format($product['price'] * $product['count'], 2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="to-buy">PROCEED TO BUY</button>
                </form>
            @else
                Cart is empty
            @endif
            <div class="clearfix"> </div>
        </div>
    </div>
    <script>
        $(".simpleCart_empty").click(function() {
            window.location.reload();
        });
    </script>
@endsection