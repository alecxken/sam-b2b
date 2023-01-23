@extends('layouts.main')
@section('content')

        <main class="main">
            <div class="container container-not-boxed">
               <!--  -->
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
                                <b class="coupon-sale-text text-white bg-secondary">KES<em>199</em>99</b>
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
                                <span class="text-secondary ml-2 mr-5 pr-sm-5">KES<em class="ls-n-20">29</em>99</span>
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

          
        </main><!-- End .main -->

        @endsection

      