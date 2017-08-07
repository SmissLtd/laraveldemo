<?php
/**
 * @param App\Product $product
 * @param App\Category[] $categories
 * @param App\Product[] $bestsellers
 * @param App\Tag[] $tags
 */
?>
@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">{{ $product->name }}</li>
            </ol>
        </div>
    </div>
    <div class="single">
        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">		
                    <div class="flexslider">
                        <ul class="slides">
                            @if (!empty($product->photo_big1))
                                <li data-thumb="{{ asset('images/' . $product->photo_big1) }}">
                                    <div class="thumb-image"> <img src="{{ asset('images/' . $product->photo_big1) }}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                            @endif
                            @if (!empty($product->photo_big2))
                                <li data-thumb="{{ asset('images/' . $product->photo_big2) }}">
                                    <div class="thumb-image"> <img src="{{ asset('images/' . $product->photo_big2) }}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                            @endif
                            @if (!empty($product->photo_big3))
                                <li data-thumb="{{ asset('images/' . $product->photo_big3) }}">
                                    <div class="thumb-image"> <img src="{{ asset('images/' . $product->photo_big3) }}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <script>
                        $(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                            $('.popup-with-zoom-anim').magnificPopup({
                                    type: 'inline',
                                    fixedContentPos: false,
                                    fixedBgPos: true,
                                    overflowY: 'auto',
                                    closeBtnInside: true,
                                    preloader: false,
                                    midClick: true,
                                    removalDelay: 300,
                                    mainClass: 'my-mfp-zoom-in'
                            });
                        });
                    </script>
                </div>	
                <div class="col-md-7 single-top-in">
                    <div class="single-para simpleCart_shelfItem">
                        <h2>{{ $product->name_long }}</h2>
                        <p>{{ $product->description }}</p>
                        <label  class="add-to item_price">${{ number_format($product->price, 2) }}</label>
                        <a href="#" class="cart item_add" data-id="{{ $product->id }}">Add To Cart</a>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="content-top1">
                    @foreach ($products as $item)
                        <div class="col-md-4 col-md4">
                            <div class="col-md1 simpleCart_shelfItem">
                                <a href="{{ action('ProductController@product', ['id' => $item->id]) }}">
                                    <img class="img-responsive" src="{{ asset('images/' .  $item->photo) }}" alt="" />
                                </a>
                                <h3><a href="{{ action('ProductController@product', ['id' => $item->id]) }}">{{ $item->name }}</a></h3>
                                <div class="price">
                                    <h5 class="item_price">${{ number_format($item->price, 2) }}</h5>
                                    <a href="#" class="item_add" data-id="{{ $item->id }}">Add To Cart</a>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>	
                    @endforeach
                    <div class="clearfix"> </div>
                </div>		
            </div>

            <div class="col-md-3 product-bottom">
                <div class=" rsidebar span_1_of_left">
                    <h3 class="cate">Categories</h3>
                    <ul class="menu-drop">
                        @foreach ($categories as $cat)
                            <li class="item1"><a href="#">{{ $cat->name }}</a>
                                <ul class="cute">
                                    @foreach ($cat->products()->take(3)->get() as $product)
                                        <li class="subitem1"><a href="{{ action('ProductController@product', ['id' => $product->id]) }}">{{ $product->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <script type="text/javascript">
                    $(function () {
                        var menu_ul = $('.menu-drop > li > ul'),
                                menu_a = $('.menu-drop > li > a');
                        menu_ul.hide();
                        menu_a.click(function (e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });
                    });
                </script>

                <div class="product-bottom">
                    <h3 class="cate">Best Sellers</h3>
                    @foreach ($bestsellers as $product)
                        <div class="product-go">
                            <div class=" fashion-grid">
                                <a href="{{ action('ProductController@product', ['id' => $product->id]) }}">
                                    <img class="img-responsive " src="{{ asset('images/' . $product->photo) }}" alt="">
                                </a>
                            </div>
                            <div class=" fashion-grid1">
                                <h6 class="best2"><a href="{{ action('ProductController@product', ['id' => $product->id]) }}">{{ $product->description }}</a></h6>
                                <span class=" price-in1">${{ number_format($product->price, 2) }}</span>
                            </div>	
                            <div class="clearfix"> </div>
                        </div>
                    @endforeach		
                </div>

                @if (count($tags) > 0)
                    <div class="tag">
                        <h3 class="cate">Tags</h3>
                        <div class="tags">
                            <ul>
                                @foreach ($tags as $tag)
                                    <li><a href="{{ action('ProductController@tag', ['id' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                @endforeach
                                <div class="clearfix"> </div>
                            </ul>
                        </div>					
                    </div>
                @endif
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection