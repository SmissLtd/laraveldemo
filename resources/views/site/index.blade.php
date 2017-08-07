<?php
/**
 * @param App\Category $offerCategory
 * @param App\Product[] $offerProducts
 * @param App\Category[] $offerCategories
 * @param App\Product[] $products
 */
?>
@extends('layouts.app')

@section('content')
    <!--banner-->
    <div class="banner">
        <div class="matter-banner">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>
                            <img src="images/1.jpg" alt="">
                            <div class="tes animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <h2>MEN & WOMEN</h2>
                                <h3>Trousers & Chinos</h3>
                                <h4>UPTO 50%</h4>
                                <p>OFFER</p>
                            </div>
                        </li>
                        <li>
                            <img src="images/3.jpg" alt=""> 
                            <div class="tes animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <h2>MEN & WOMEN</h2>
                                <h3>Trousers & Chinos</h3>
                                <h4>UPTO 50%</h4>
                                <p>OFFER</p>
                            </div>					
                        </li>
                        <li>
                            <img src="images/2.jpg" alt="">
                            <div class="tes animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <h2>MEN & WOMEN</h2>
                                <h3>Trousers & Chinos</h3>
                                <h4>UPTO 50%</h4>
                                <p>OFFER</p>
                            </div>
                        </li>	
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--//banner-->
    <!--content-->
    @if (!empty($offerProducts))
        <div class="content">
            <div class="container">
                <div class="content-top">
                    <div class="content-top1">
                        <div class="col-md-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
                            <div class="col-md1 simpleCart_shelfItem">
                                <a href="{{ action('ProductController@product', ['id' => $offerProducts[0]->id]) }}">
                                    <img class="img-responsive" src="{{ asset('images/' . $offerProducts[0]->photo) }}" alt="" />
                                </a>
                                <h3><a href="{{ action('ProductController@product', ['id' => $offerProducts[0]->id]) }}">{{ $offerProducts[0]->name }}</a></h3>
                                <div class="price">
                                    <h5 class="item_price">${{ $offerProducts[0]->price }}</h5>
                                    <a href="#" class="item_add" data-id="{{ $offerProducts[0]->id }}">Add To Cart</a>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>	
                        <div class="col-md-6 animated wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="col-md3" style="background-image: url({{ asset('images/' . $offerCategory->photo_big) }});">
                                <div class="up-t">
                                    <h3>Flat 50% Offer</h3>
                                </div>
                            </div>
                        </div>
                        @if (count($offerProducts) > 1)
                            <div class="col-md-3 col-md2 animated wow fadeInRight" data-wow-delay=".5s">
                                <div class="col-md1 simpleCart_shelfItem">
                                    <a href="{{ action('ProductController@product', ['id' => $offerProducts[1]->id]) }}">
                                        <img class="img-responsive" src="{{ asset('images/' . $offerProducts[1]->photo) }}" alt="" />
                                    </a>
                                    <h3><a href="{{ action('ProductController@product', ['id' => $offerProducts[1]->id]) }}">{{ $offerProducts[1]->name }}</a></h3>
                                    <div class="price">
                                        <h5 class="item_price">${{ $offerProducts[1]->price }}</h5>
                                        <a href="#" class="item_add" data-id="{{ $offerProducts[1]->id }}">Add To Cart</a>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>	
                        @endif
                        <div class="clearfix"> </div>
                    </div>
                    <div class="content-top1">
                        @for ($index = 2; $index < count($offerProducts); $index++)
                            <div class="col-md-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
                                <div class="col-md1 simpleCart_shelfItem">
                                    <a href="{{ action('ProductController@product', ['id' => $offerProducts[$index]->id]) }}">
                                        <img class="img-responsive" src="{{ asset('images/' . $offerProducts[$index]->photo) }}" alt="" />
                                    </a>
                                    <h3><a href="{{ action('ProductController@product', ['id' => $offerProducts[$index]->id]) }}">{{ $offerProducts[$index]->name }}</a></h3>
                                    <div class="price">
                                        <h5 class="item_price">${{ $offerProducts[$index]->price }}</h5>
                                        <a href="#" class="item_add" data-id="{{ $offerProducts[$index]->id }}">Add To Cart</a>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>	
                        @endfor
                        <div class="clearfix"> </div>
                    </div>			
                </div>
            </div>
        </div>
    @endif
    <!--//content-->
    <div class="con-tp">
        <div class="container">
            @for ($index = 0; $index < count($offerCategories); $index++)
                <div class="col-md-4 con-tp-lft animated wow fadeInLeft" data-wow-delay=".5s">
                    <a href="{{ action('ProductController@category', ['category' => $offerCategories[$index]->id]) }}">
                        <div class="content-grid-effect slow-zoom vertical">
                            <div class="img-box"><img src="{{ asset('images/' . $offerCategories[$index]->photo) }}" alt="image" class="img-responsive zoom-img"></div>
                            <div class="info-box">
                                <div class="info-content simpleCart_shelfItem">
                                    <h4>{{ $offerCategories[$index]->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @if (($index + 1) % 3 == 0)
                    <div class="clearfix"></div>
                @endif
            @endfor
        </div>
    </div>
    <div class="c-btm">
        <div class="content-top1">
            <div class="container">
                @foreach ($products as $product)
                    <div class="col-md-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
                        <div class="col-md1 simpleCart_shelfItem">
                            <a href="{{ action('ProductController@product', ['id' => $product->id]) }}">
                                <img class="img-responsive" src="{{ asset('images/' . $product->photo) }}" alt="" />
                            </a>
                            <h3><a href="{{ action('ProductController@product', ['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                            <div class="price">
                                <h5 class="item_price">${{ $product->price }}</h5>
                                <a href="#" class="item_add" data-id="{{ $product->id }}">Add To Cart</a>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>	
        </div>
    </div>
   @endsection