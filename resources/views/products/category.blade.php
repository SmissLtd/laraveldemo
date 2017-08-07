<?php
/**
 * @param App\Tag[] $tags
 * @param App\Product[] $products
 * @param string $title
 * @param App\Category[] $categories
 * @param App\Product[] $bestsellers
 */
?>
@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="{{ action('SiteController@index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <h2>{{ $title }}</h2>
            <div class="col-md-9">
                <div class="content-top1">
                    @for ($index = 0; $index < count($products); $index++)
                        <div class="col-md-4 col-md4">
                            <div class="col-md1 simpleCart_shelfItem">
                                <a href="{{ action('ProductController@product', ['id' => $products[$index]->id]) }}">
                                    <img class="img-responsive" src="{{ asset('images/' . $products[$index]->photo) }}" alt="" />
                                </a>
                                <h3><a href="{{ action('ProductController@product', ['id' => $products[$index]->id]) }}">{{ $products[$index]->name }}</a></h3>
                                <div class="price">
                                    <h5 class="item_price">${{ $products[$index]->price }}</h5>
                                    <a href="#" class="item_add" data-id="{{ $products[$index]->id }}">Add To Cart</a>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                        @if (($index + 1) % 3 == 0)
                            <div class="clearfix"> </div>
                            </div>	
                            <div class="content-top1">
                        @endif
                    @endfor
                    @if (empty($products))
                        There are no products in this category yet
                    @endif
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
                <!--initiate accordion-->
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