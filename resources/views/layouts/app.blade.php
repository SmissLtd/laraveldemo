<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Youth Fashion A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        
        <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />	
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen" />
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('js/imagezoom.js') }}"></script>
        <script src="{{ asset('js/jquery.flexslider.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: false,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
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
            new WOW().init();
        </script>
    </head>
    <body>
        <!--header-->
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="col-sm-4 logo animated wow fadeInLeft" data-wow-delay=".5s">
                        <h1><a href="{{ action('SiteController@index') }}">Youth <span>Fashion</span></a></h1>	
                    </div>
                    <div class="col-sm-4 world animated wow fadeInRight" data-wow-delay=".5s">
                        <div class="cart box_1">
                            <a href="{{ action('ProductController@checkout') }}">
                                <h3>
                                    <div class="total">
                                        <span class="simpleCart_total">${{ number_format(session('cart.total', '0.00'), 2) }}</span>
                                    </div>
                                    <img src="{{ asset('images/cart.png') }}" alt=""/>
                                </h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                        </div>
                    </div>
                    <div class="col-sm-2 number animated wow fadeInRight" data-wow-delay=".5s">
                        <span><i class="glyphicon glyphicon-phone"></i>{{ $configPhoneShort }}</span>
                        <p>Call me</p>
                    </div>
                    <div class="col-sm-2 search animated wow fadeInRight" data-wow-delay=".5s">		
                        <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="container">
                <div class="head-top">
                    <div class="n-avigation">
                        <nav class="navbar nav_bottom" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"></a>
                            </div> 
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav nav_1">
                                    <li><a href="{{ action('SiteController@index') }}">Home</a></li>
                                    <li><a href="{{ action('ProductController@category', ['category' => 2]) }}">Women</a></li>
                                    <li><a href="{{ action('ProductController@category', ['category' => 1]) }}">Man</a></li>
                                    <li><a href="{{ action('ProductController@category') }}">Products</a></li>
                                    @if (Auth::guest())
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                    @else
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout({{ Auth::user()->first_name }})
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    @endif
                                    <li class="last"><a href="{{ action('SiteController@contact') }}">Contact</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <div class="clearfix"> </div>

                    <!---//pop-up-box---->
                    <div id="small-dialog" class="mfp-hide">
                        <div class="search-top">
                            <div class="login">
                                <form action="{{ action('ProductController@search') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="submit" value="">
                                    <input type="text" name="search" value="Type something..." onfocus="this.value = '';" />		
                                </form>
                            </div>
                            <p>	Shopping</p>
                        </div>				
                    </div>
                    <!---->		
                </div>
            </div>
        </div>
        @yield('content')
        <!--footer-->
        <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="col-md-6 top-footer animated wow fadeInLeft" data-wow-delay=".5s">
                        <h3>Follow Us On</h3>
                        <div class="social-icons">
                            <ul class="social">
                                <li><a href="#"><i></i></a> </li>
                                <li><a href="#"><i class="facebook"></i></a></li>	
                                <li><a href="#"><i class="google"></i> </a></li>
                                <li><a href="#"><i class="linked"></i> </a></li>						
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6 top-footer1 animated wow fadeInRight" data-wow-delay=".5s">
                        <h3>Newsletter</h3>
                        <form action="#" method="post" id="form-newsletter">
                            {{ csrf_field() }}
                            <input type="email" name="email" value="" required="required">
                            <input type="submit" value="SUBSCRIBE">
                        </form>
                    </div>
                    <div class="clearfix"> </div>	
                </div>	
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="col-md-3 footer-bottom-cate animated wow fadeInLeft" data-wow-delay=".5s">
                        <h6>Categories</h6>
                        <ul>
                            @foreach ($footerCategories as $category)
                                <li><a href="{{ action('ProductController@category', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3 footer-bottom-cate animated wow fadeInLeft" data-wow-delay=".5s">
                        <h6>Feature Categories</h6>
                        <ul>
                            @foreach ($footerFeatureCategories as $category)
                                <li><a href="{{ action('ProductController@category', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3 footer-bottom-cate animated wow fadeInRight" data-wow-delay=".5s">
                        <h6>Top Brands</h6>
                        <ul>
                            @foreach ($footerBrands as $brand)
                                <li><a href="{{ action('ProductController@brand', ['brand' => $brand->id]) }}">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3 footer-bottom-cate cate-bottom animated wow fadeInRight" data-wow-delay=".5s">
                        <h6>Our Address</h6>
                        <ul>
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ $configAddress }}</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:{{ $configEmail }}">{{ $configEmail }}</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : {{ $configPhoneFull }}</li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                    <p class="footer-class animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"> © 2016 Youth Fashion . All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                </div>
            </div>
        </div>
        <!--footer-->
    </body>
</html>