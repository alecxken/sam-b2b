@extends('layouts.main')
@section('content')

        <main class="main">
            <div class="container container-not-boxed">
                <div class="info-boxes-slider owl-carousel owl-theme" data-owl-options="{
                        'dots': false,
                        'loop': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '480': {
                                'items': 2
                            },
                            '992': {
                                'items': 3
                            }
                        }
                    }">
                    <div class="info-box info-box-icon-left">
                        <i class="fa fa-ship font-35 pt-1"></i>

                        <div class="info-box-content pt-1">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="fa fa-money pt-1"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="fa fa-support pt-1"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div><!-- End .info-boxes-slider -->

                <div
                    class="home-slider outer-container w-auto owl-carousel owl-theme owl-carousel-lazy show-nav-hover nav-large nav-outer mb-2">
                    <div class="home-slide home-slide1 banner banner-md-vw bg-white">
                        <img class="slide-bg" src="assets/images/demoes/demo5/slider/slide-1.jpg"
                            style="background-color: #fff;" alt="slider image">
                        <div class="banner-layer banner-layer-middle">
                            <h4 class="m-b-3">Find the Boundaries. Push Through!</h4>
                            <h2 class="font-script mb-0">Jeans Sale</h2>
                            <h3 class="upto-text"><em>up<br>to</em>80% OFF</h3>
                            <h5 class="d-inline-block mb-0 text-uppercase ls-n-20">
                                Starting At
                                <b class="coupon-sale-text text-white bg-secondary">$<em>199</em>99</b>
                            </h5>
                            <a href="demo5-shop.html" class="btn btn-dark btn-lg ls-10">Shop Now!</a>
                        </div><!-- End .banner-layer -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide home-slide2 banner banner-md-vw">
                        <img class="slide-bg" src="assets/images/demoes/demo5/slider/slide-2.jpg"
                            style="background-color: #ccc;" alt="slider image">
                        <div class="banner-layer banner-layer-middle">
                            <h2 class="ls-n-25 mb-0">Women's Business Fashion</h2>
                            <h3 class="upto-text"><em>up<br>to</em>60% OFF</h3>
                            <h5 class="text-uppercase d-inline-block mb-0 align-top ls-n-20">Starting at
                                <span class="text-secondary ml-2 mr-5 pr-sm-5">$<em class="ls-n-20">29</em>99</span>
                            </h5>
                            <a href="demo5-shop.html" class="btn btn-dark btn-outline ls-10 btn-xl mt-0">Shop
                                Now!</a>
                        </div>
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->

            
            </div><!-- End .container-not-boxed -->

            <div class="container">
                <div class="products-container bg-white text-center mb-2">
                    <div class="row product-ajax-grid mb-2">
                   
                       <!-- End .col-xl-5col -->
                        @php 
                        $datas = \App\Models\Product::all();
                        @endphp
                        @isset($datas)
                        @foreach($datas  as $dd)
                        <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                            <div class="product-default inner-quickview inner-icon">
                                <figure style="height: 212px; width: 212px;">
                                    <a href="/product/{{$dd->id}}">
                                        <img src="\products\{{$dd->photos}}" width="212" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="demo5-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <a href="/getproduct/{{$dd->id}}" class="btn-quickview"
                                        title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo5-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/product/{{$dd->id}}">{{$dd->product_name}}</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">Ksh {{$dd->sell_price + $dd->sell_price*0.5 }}</span>
                                        <span class="product-price">Ksh {{$dd->sell_price}}</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div><!-- End .col-xl-5col -->
                        @endforeach 
                        @endisset

                      
                     
                    </div><!-- End .row -->

                </div><!-- End .container-box -->
            </div><!-- End .container -->

            <div class="container container-not-boxed mt-2">
                <div class="banner banner-big-sale mb-5" data-parallax="{'speed': 3.2, 'enableOnMobile': true}"
                    data-image-src="assets/images/demoes/demo5/banners/banner-4.jpg">
                    <div class="banner-content row align-items-center py-3 mx-0">
                        <div class="col-xl-9 col-sm-8 pt-3">
                            <h2 class="text-white text-uppercase mb-md-0 px-3 text-center text-sm-left">
                                <b class="d-inline-block mr-3 mb-1">Big Sale</b>
                                All new fashion brands items up to 70% off
                                <small class="text-transform-none align-middle">Online Purchases Only</small>
                            </h2>
                        </div>
                        <div class="col-xl-3 col-sm-4 py-3 text-center text-sm-right">
                            <a class="btn btn-light btn-lg mr-3 ls-10" href="#">View Sale</a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="feature-boxes-container row mt-6 mb-1">
                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 px-md-4 feature-box-simple text-center">
                                <i class="sicon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3 class="mb-0 pb-1">Customer Support</h3>
                                    <h5 class="m-b-3">Need Assistance?</h5>

                                    <p>We really care about you and your website as much as you do. Purchasing Porto
                                        or
                                        any other theme from us you get 100% free support.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 px-md-4 feature-box-simple text-center">
                                <i class="sicon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3 class="mb-0 pb-1">Secured Payment</h3>
                                    <h5 class="m-b-3">Safe &amp; Fast</h5>

                                    <p>With Porto you can customize the layout, colors and styles within only a few
                                        minutes. Start creating an amazing website right now!</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 px-md-4 feature-box-simple text-center">
                                <i class="sicon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3 class="mb-0 pb-1">Returns</h3>
                                    <h5 class="m-b-3">Easy &amp; Free</h5>

                                    <p>Porto has very powerful admin features to help customer to build their own
                                        shop
                                        in minutes without any special skills in web development.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .feature-boxes-container.row -->

                 

                </div>
                
            </div><!-- End .container-not-boxed -->
        </main><!-- End .main -->

        @endsection

      