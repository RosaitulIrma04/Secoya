<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Secoya</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +62 859-4766-7579</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Secoya@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Jl. Lingkar Barat Batuan Sumenep</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <!-- My Account Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-o"></i> My Account <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('login.pembeli') }}">Login Pembeli</a></li>
                            <li><a href="{{ route('login.penjual') }}">Login Penjual</a></li>
                        </ul>
                    </li>>


                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">{{ count(session('wishlist', [])) }}</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <div class="header-ctn">
                                    <!-- Cart -->
                                    <div>
                                        <a href="{{ route('sindiran') }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Your Cart</span>
                                            <div class="qty">
                                                {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /Cart -->
                                </div>



                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ 'assets/img/product01.png' }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a>
                                                </h3>
                                                <h4 class="product-price"><span class="qty">1x</span>Rp 300.000</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ 'assets/img/product02.png' }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a>
                                                </h3>
                                                <h4 class="product-price"><span class="qty">3x</span>Rp 2.000.000
                                                </h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5>SUBTOTAL: Rp 6.700.000</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{ route('cart.index') }}">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active" style="margin-right: 15px;"><a href="#">Home</a></li>
                    <li style="margin-right: 15px;"><a href="#">Hot Deals</a></li>
                    <li style="margin-right: 15px;"><a href="#">Categories</a></li>
                    <li style="margin-right: 15px;"><a href="#">Elektronik</a></li>
                    <li style="margin-right: 15px;"><a href="#">Fashion</a></li>
                    <li><a href="#">Furniture</a></li>
                </ul>

                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ 'assets/img/shop01.png' }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ 'assets/img/shop03.png' }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Accessories<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ 'assets/img/shop02.png' }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Cameras<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product01.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 150.000 <del class="product-old-price">Rp
                                                    250.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="1">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="150000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product01.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="1">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="150000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product01.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product02.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 250.000 <del class="product-old-price">Rp
                                                    300.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="2">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="250000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product02.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="2">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="250000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product02.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product03.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 300.000 <del class="product-old-price">Rp
                                                    350.000</del></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="3">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="300000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product03.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="3">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="300000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product03.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product04.png') }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 200.000 <del class="product-old-price">Rp
                                                    250.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="4">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="200000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product04.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="4">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="200000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product04.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product05.png') }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 300.000 <del class="product-old-price">Rp
                                                    350.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="5">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="300000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product05.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="5">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="300000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product05.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product06.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 300.000 <del class="product-old-price">Rp
                                                    300.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="6">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="300000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product06.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="6">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="300000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product06.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product07.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 200.000 <del class="product-old-price">Rp
                                                    200.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="7">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="200000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product07.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="7">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="200000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product07.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product08.png') }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 250.000 <del class="product-old-price">Rp
                                                    300.000</del></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="8">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="250000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product08.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="8">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="250000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product08.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product09.png') }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 150.000 <del class="product-old-price">Rp
                                                    150.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="9">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="150000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product09.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="9">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="150000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product09.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/product01.png') }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price">Rp 450.000 <del class="product-old-price">Rp
                                                    400.000</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form class="form-add-to-wishlist" method="POST"
                                                    action="{{ route('wishlist.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="10">
                                                    <input type="hidden" name="name"
                                                        value="product name goes here">
                                                    <input type="hidden" name="price" value="450000">
                                                    <input type="hidden" name="image"
                                                        value="{{ asset('assets/img/product01.png') }}">
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </form>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form class="form-add-to-cart" method="POST"
                                                action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="10">
                                                <input type="hidden" name="name" value="product name goes here">
                                                <input type="hidden" name="price" value="450000">
                                                <input type="hidden" name="image"
                                                    value="{{ asset('assets/img/product01.png') }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="add-to-cart-btn"><i
                                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product07.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 350.000 <del class="product-old-price">Rp
                                            300.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product08.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 250.000 <del class="product-old-price">Rp
                                            200.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product09.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 500.000 <del class="product-old-price">Rp
                                            450.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product01.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 350.000 <del class="product-old-price">Rp
                                            300.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product02.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 150.000 <del class="product-old-price">Rp
                                            100.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product03.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 450.000 <del class="product-old-price">Rp
                                            400.000</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product04.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 100.000 <del class="product-old-price">Rp
                                            50.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product05.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 600.000 <del class="product-old-price">Rp
                                            550.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product06.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 550.000 <del class="product-old-price">$Rp
                                            500.000</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product07.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 450.000 <del class="product-old-price">Rp
                                            400.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product08.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 350.000 <del class="product-old-price">Rp
                                            300.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product09.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 250.000 <del class="product-old-price">Rp
                                            200.000</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product01.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 150.000 <del class="product-old-price">Rp
                                            100.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product02.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$Rp 450.000 <del class="product-old-price">Rp
                                            400.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product03.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 350.000 <del class="product-old-price">Rp
                                            300.000</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product04.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 450.000 <del class="product-old-price">Rp
                                            400.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product05.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 550.000 <del class="product-old-price">Rp
                                            500.000</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('assets/img/product06.png') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">Rp 350.000 <del class="product-old-price">Rp
                                            300.000</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Secoya adalah toko online yang menjual barang bekas khusus mahasiswa. Kami menyediakan
                                berbagai kebutuhan seperti buku, elektronik, fashion, dan furniture, dengan harga
                                terjangkau dan kualitas tetap terjaga.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>Jl. Lingkar Barat Batuan
                                        Sumenep</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+62-859-4766-7579</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>Secoya@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        // Variabel global untuk status login (dari kode asli Anda)
        window.isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};

        $(document).ready(function() {
            // === KODE ASLI ANDA UNTUK CART & WISHLIST ===
            // Add to cart
            $('.form-add-to-cart').on('submit', function(e) {
                e.preventDefault();

                // Cek login
                if (!window.isLoggedIn) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Login Diperlukan',
                        text: 'Silakan login terlebih dahulu untuk menambah ke keranjang!',
                        confirmButtonText: 'Ok'
                    });
                    return false;
                }

                var form = $(this);
                $.ajax({
                    url: "{{ route('cart.add') }}", // Pastikan route ini ada
                    method: "POST",
                    data: form.serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Penting untuk request POST Laravel
                    },
                    success: function(res) {
                        if (res.success) {
                            // Update jumlah cart
                            // Sesuaikan selector ini jika berbeda di HTML Anda
                            var cartQtyElement = $('.header-ctn .fa-shopping-cart').siblings(
                                '.qty');
                            if (cartQtyElement.length) {
                                cartQtyElement.text(res.cart_count);
                            } else {
                                // Fallback jika struktur sedikit berbeda atau untuk debugging
                                console.log("Elemen qty keranjang tidak ditemukan, jumlah: " +
                                    res.cart_count);
                            }


                            // Render ulang isi cart di header
                            // Sesuaikan selector '.cart-dropdown .cart-list' jika berbeda
                            var cartList = $('.cart-dropdown .cart-list');
                            cartList.empty(); // Kosongkan list sebelum menambah item baru
                            if (res.cart_items && res.cart_items.length > 0) {
                                res.cart_items.forEach(function(item) {
                                    // Pastikan properti item.image, item.name, item.quantity, item.price ada dan benar
                                    let itemPriceFormatted = parseInt(item.price)
                                        .toLocaleString('id-ID');
                                    cartList.append(`
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="${item.image_url || './img/product-placeholder.png'}" alt="${item.name || 'Produk'}">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">${item.name || 'Nama Produk'}</a></h3>
                                            <h4 class="product-price"><span class="qty">${item.quantity || 0}x</span>Rp ${itemPriceFormatted}</h4>
                                        </div>
                                        {{-- Tombol delete di cart dropdown bisa memerlukan fungsionalitas AJAX terpisah --}}
                                        {{-- <button class="delete" data-id="${item.id}"><i class="fa fa-close"></i></button> --}}
                                    </div>
                                `);
                                });
                                // Update total keranjang jika ada di response dan elemennya ada
                                if (res.cart_total_formatted && $(
                                        '.cart-dropdown .cart-summary small').length) {
                                    $('.cart-dropdown .cart-summary small').text(res
                                        .cart_count + ' Item terpilih');
                                }
                                if (res.cart_total_formatted && $(
                                        '.cart-dropdown .cart-summary h5').length) {
                                    $('.cart-dropdown .cart-summary h5').text('SUBTOTAL: Rp ' +
                                        res.cart_total_formatted);
                                }
                            } else {
                                cartList.append(
                                    '<p class="text-center my-3">Keranjang Anda kosong.</p>'
                                );
                                if ($('.cart-dropdown .cart-summary small').length) {
                                    $('.cart-dropdown .cart-summary small').text(
                                        '0 Item terpilih');
                                }
                                if ($('.cart-dropdown .cart-summary h5').length) {
                                    $('.cart-dropdown .cart-summary h5').text('SUBTOTAL: Rp 0');
                                }
                            }


                            // Tampilkan alert sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: res.message ||
                                    'Produk berhasil ditambahkan ke keranjang!', // Ambil pesan dari response jika ada
                                timer: 1200,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message ||
                                    'Gagal menambahkan produk ke keranjang.',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani error AJAX
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat menghubungi server. Silakan coba lagi.',
                        });
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            });

            // Add to wishlist (pakai event delegation)
            $(document).on('submit', '.form-add-to-wishlist', function(e) {
                e.preventDefault();

                if (!window.isLoggedIn) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Login Diperlukan',
                        text: 'Silakan login terlebih dahulu untuk menambah ke wishlist!',
                        confirmButtonText: 'Ok'
                    });
                    return false;
                }

                var form = $(this);
                $.ajax({
                    url: form.attr('action'), // URL diambil dari atribut action form
                    method: "POST",
                    data: form.serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Penting untuk request POST Laravel
                    },
                    success: function(res) {
                        if (res.success) {
                            // Update jumlah wishlist di header jika ada
                            // Sesuaikan selector ini jika berbeda di HTML Anda
                            var wishlistQtyElement = $('.header-ctn .fa-heart-o').siblings(
                                '.qty');
                            if (wishlistQtyElement.length) {
                                wishlistQtyElement.text(res.wishlist_count);
                            } else {
                                console.log("Elemen qty wishlist tidak ditemukan, jumlah: " +
                                    res.wishlist_count);
                            }

                            // Tampilkan alert sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: res.message ||
                                    'Produk berhasil ditambahkan ke wishlist!', // Ambil pesan dari response
                                timer: 1200,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message ||
                                    'Gagal menambahkan produk ke wishlist.',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani error AJAX
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat menghubungi server. Silakan coba lagi.',
                        });
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            });

        });
    </script>
</body>


</html>
