
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>B2B-SITE</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">


    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/demo5.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
     <link rel="stylesheet" href="{{asset('myfiles/font-awesome/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">

</head>
  @php  $datas = \App\Models\Cart::leftJoin('products', 'products.id', '=', 'carts.product_id')->where('_token',csrf_token())->select('carts.*','products.product_name', 'products.sell_price','products.photos')->get();    @endphp
<body>
    <div class="page-wrapper">
    

        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left d-none d-sm-block">
                        <p class="top-message text-uppercase">FREE Returns. Standard Shipping Orders $99+</p>
                    </div><!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                        <div class="header-dropdown dropdown-expanded mr-md-3 mr-lg-0 pr-0 d-none d-lg-block">
                            <div class="header-menu">
                                <ul>
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="demo5-about.html">About Us</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html" class="login-link">Log In</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <span class="separator d-none d-lg-inline-block"></span>

                        <div class="header-dropdown pr-0">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <div class="header-dropdown ml-0 ml-md-4 mr-auto mr-sm-3 mr-md-0">
                            <a href="#"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div><!-- End .social-icons -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div>

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="/" class="logo">
                            <img src="{{asset('images/logo.png')}}" alt="Porto Logo">
                            <img src="{{asset('images/logo.png')}}" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div
                            class="header-icon header-icon header-search header-search-inline header-search-category w-lg-max ml-3 mr-xl-4">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..."
                                        required="">
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">All Categories</option>
                                            <option value="4">Fashion</option>
                                            <option value="12">- Women</option>
                                            <option value="13">- Men</option>
                                            <option value="66">- Jewellery</option>
                                            <option value="67">- Kids Fashion</option>
                                            <option value="5">Electronics</option>
                                            <option value="21">- Smart TVs</option>
                                            <option value="22">- Cameras</option>
                                            <option value="63">- Games</option>
                                            <option value="7">Home &amp; Garden</option>
                                            <option value="11">Motors</option>
                                            <option value="31">- Cars and Trucks</option>
                                            <option value="32">- Motorcycles &amp; Powersports</option>
                                            <option value="33">- Parts &amp; Accessories</option>
                                            <option value="34">- Boats</option>
                                            <option value="57">- Auto Tools &amp; Supplies</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn icon-magnifier" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="header-contact d-none d-lg-flex align-items-center ml-auto pl-1  pr-xl-2">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1">Call us now<a href="tel:#" class="text-dark font1">+123 5678 890</a></h6>
                        </div>

                        <a href="login.html" class="header-icon header-icon-user login-link"><i
                                class="icon-user-2"></i></a>

                        <a href="wishlist.html" class="header-icon pb-md-1"><i class="icon-wishlist-2"></i></a>

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">{{count($datas)}}</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
@php $total = 0 @endphp

                                        @isset($datas)
                                        @foreach($datas as $rt)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="">{{$rt->product_name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$rt->qty}}</span>
                                                    × Ksh {{$rt->sell_price}}
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="/" class="product-image">
                                                    <img src="/products/{{$rt->photos}}"
                                                        alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                            

                                        </div><!-- End .product -->
                                        <input type="hidden" name="pp" value="{{ $total += $rt->price}}">
                                        
                                        @endforeach
                                        @endisset

                                        <!-- End .product -->
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">Ksh {{$total}}</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div>

            <div class="header-bottom sticky-header d-lg-block d-none" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <div class="header-left">
                        <a href="/" class="logo">
                            <img src="{{asset('images/logo.png')}}" alt="Porto Logo">
                        </a>
                    </div>
                    <div class="header-center">
                        <nav class="main-nav w-100 w-lg-max bg-primary">
                            <ul class="menu">
                                <li class="active">
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="/">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 1</a>
                                                <ul class="submenu">
                                                    <li><a href="category.html">Fullwidth Banner</a></li>
                                                    <li><a href="category-banner-boxed-slider.html">Boxed Slider
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category-banner-boxed-image.html">Boxed Image
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category.html">Left Sidebar</a></li>
                                                    <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                    <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                                                    <li><a href="category-horizontal-filter1.html">Horizontal
                                                            Filter1</a>
                                                    </li>
                                                    <li><a href="category-horizontal-filter2.html">Horizontal
                                                            Filter2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 2</a>
                                                <ul class="submenu">
                                                    <li><a href="category-list.html">List Types</a></li>
                                                    <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                                    </li>
                                                    <li><a href="category.html">3 Columns Products</a></li>
                                                    <li><a href="category-4col.html">4 Columns Products</a></li>
                                                    <li><a href="category-5col.html">5 Columns Products</a></li>
                                                    <li><a href="category-6col.html">6 Columns Products</a></li>
                                                    <li><a href="category-7col.html">7 Columns Products</a></li>
                                                    <li><a href="category-8col.html">8 Columns Products</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner">
                                                    <figure>
                                                        <img src="assets/images/menu-banner.jpg" alt="Menu banner"
                                                            width="300" height="300">
                                                    </figure>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span class="">UP TO</span><br />
                                                            <b class="">50%</b>
                                                            <i>OFF</i>
                                                        </h4>
                                                        <a href="demo5-shop.html" class="btn btn-sm btn-dark">SHOP
                                                            NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End .megamenu -->
                                </li>
                                <li>
                                    <a href="demo5-product.html">Products</a>                                  
                                </li>
                               
                                               
                                <li><a href="demo5-contact.html">Contact Us</a></li>
                                <li class="float-right"><a href="" class="pl-3"
                                        target="_blank">Buy Porto!</a></li>
                                <li class="float-right mr-3"><a href="#" class="pl-5">Special Offer!</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="qqq" placeholder="Search..."
                                        required>
                                    <div class="select-custom">
                                        <select id="category" name="cat">
                                            <option value="">All Categories</option>
                                            <option value="4">Fashion</option>
                                            <option value="12">- Women</option>
                                            <option value="13">- Men</option>
                                            <option value="66">- Jewellery</option>
                                            <option value="67">- Kids Fashion</option>
                                            <option value="5">Electronics</option>
                                            <option value="21">- Smart TVs</option>
                                            <option value="22">- Cameras</option>
                                            <option value="63">- Games</option>
                                            <option value="7">Home &amp; Garden</option>
                                            <option value="11">Motors</option>
                                            <option value="31">- Cars and Trucks</option>
                                            <option value="32">- Motorcycles &amp; Powersports</option>
                                            <option value="33">- Parts &amp; Accessories</option>
                                            <option value="34">- Boats</option>
                                            <option value="57">- Auto Tools &amp; Supplies</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn p-0 icon-search-3" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <a href="login.html" class="header-icon "><i class="icon-user-2"></i></a>

                        <a href="wishlist.html" class="header-icon"><i class="icon-wishlist-2"></i></a>



                       

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">{{ count($datas) }}}</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo5-product.html">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × Ksh 9900
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="demo5-product.html" class="product-image">
                                                    <img src="assets/images/products/product-1.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo5-product.html">Brown Women Casual HandBag</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × Ksh 3500
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="demo5-product.html" class="product-image">
                                                    <img src="assets/images/products/product-2.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo5-product.html">Circled Ultimate 3D Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × Ksh 3500
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="demo5-product.html" class="product-image">
                                                    <img src="assets/images/products/product-3.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$Ksh 3400</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        @yield('content')

          <footer class="footer">
           

            <div class="footer-bottom">
                <div class="container d-flex justify-content-between align-items-center flex-wrap">
                    <p class="footer-copyright py-3 pr-4 mb-0 ls-n-10">© B2B. {{date('Y')}}. All Rights Reserved</p>

                    <img src="assets/images/demoes/demo5/payments.png" alt="payment methods"
                        class="footer-payments py-3">
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer>
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                                <li class="active">
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="/">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 1</a>
                                                <ul class="submenu">
                                                    <li><a href="category.html">Fullwidth Banner</a></li>
                                                    <li><a href="category-banner-boxed-slider.html">Boxed Slider
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category-banner-boxed-image.html">Boxed Image
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category.html">Left Sidebar</a></li>
                                                    <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                    <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                                                    <li><a href="category-horizontal-filter1.html">Horizontal
                                                            Filter1</a>
                                                    </li>
                                                    <li><a href="category-horizontal-filter2.html">Horizontal
                                                            Filter2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 2</a>
                                                <ul class="submenu">
                                                    <li><a href="category-list.html">List Types</a></li>
                                                    <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                                    </li>
                                                    <li><a href="category.html">3 Columns Products</a></li>
                                                    <li><a href="category-4col.html">4 Columns Products</a></li>
                                                    <li><a href="category-5col.html">5 Columns Products</a></li>
                                                    <li><a href="category-6col.html">6 Columns Products</a></li>
                                                    <li><a href="category-7col.html">7 Columns Products</a></li>
                                                    <li><a href="category-8col.html">8 Columns Products</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner">
                                                    <figure>
                                                        <img src="assets/images/menu-banner.jpg" alt="Menu banner"
                                                            width="300" height="300">
                                                    </figure>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span class="">UP TO</span><br />
                                                            <b class="">50%</b>
                                                            <i>OFF</i>
                                                        </h4>
                                                        <a href="demo5-shop.html" class="btn btn-sm btn-dark">SHOP
                                                            NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End .megamenu -->
                                </li>
                                <li>
                                    <a href="demo5-product.html">Products</a>                                  
                                </li>
                               
                                               
                                <li><a href="demo5-contact.html">Contact Us</a></li>
                                <li class="float-right"><a href="" class="pl-3"
                                        target="_blank">Buy Porto!</a></li>
                                <li class="float-right mr-3"><a href="#" class="pl-5">Special Offer!</a></li>
                            </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    <li class="border-0">
                        <a href="#">
                            Special Offer!
                        </a>
                    </li>
                    <li class="border-0">
                        <a href="https://1.envato.market/DdLk5" target="_blank">
                            Buy Porto!
                            <span class="tip tip-hot">Hot</span>
                        </a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo5-contact.html">Contact Us</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo5.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="demo5-shop.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

  

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/map.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>

</html>
   
</html>