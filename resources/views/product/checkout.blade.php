@extends('layouts.main')
@section('content')

<style type="text/css">
	.checkout-container .order-summary {
    padding: 2.8rem 3.2rem 3.1rem;
    margin-top: 1px;
}
.cart-summary, .order-summary {
    position: relative;
}
.order-summary {
    margin-bottom: 3rem;
    padding: 3rem;
    border: 2px solid #e7e7e7;
    }
</style>

<main class="main main-test">
            <div class="container checkout-container">
                <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                    <li>
                        <a href="cart.html">Shopping Cart</a>
                    </li>
                    <li class="active">
                        <a href="checkout.html">Checkout</a>
                    </li>
                   <!--  <li class="disabled">
                        <a href="#">Order Complete</a>
                    </li> -->
                </ul>

                <div class="login-form-container">
                  <!--   <h4>Returning customer?
                        <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
                    </h4> -->

                <!--     <div id="collapseOne" class="collapse">
                        <div class="login-section feature-box">
                            <div class="feature-box-content">
                                <form action="#" id="login-form">
                                    <p>
                                        If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Username or email <span class="required">*</span></label>
                                                <input type="email" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Password <span class="required">*</span></label>
                                                <input type="password" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn">LOGIN</button>

                                    <div class="form-footer mb-1">
                                        <div class="custom-control custom-checkbox mb-0 mt-0">
                                            <input type="checkbox" class="custom-control-input" id="lost-password">
                                            <label class="custom-control-label mb-0" for="lost-password">Remember
                                                me</label>
                                        </div>

                                        <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h2 class="step-title">Billing details</h2>

                                <form method="POST" action="/checkout-post" id="checkout-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First name
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" name="fname" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last name
                                                    <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="lname" class="form-control" >
                                            </div>  
                                        </div>
                                    </div>

                                 

                                    <div class="form-group">
                                        <input type="text" name="apartment" class="form-control" placeholder="Apartment, suite, unite, etc. (optional)" >
                                    </div>

                                    <div class="form-group">
                                        <label>Town / City
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text"  name="city" class="form-control" required >
                                    </div>

                                   
                                    <div class="form-group">
                                        <label>Street
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="street" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" name="phone" class="form-control" required>
                                    </div>

                                  
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mt-0">
                                            <input type="checkbox" class="custom-control-input" id="different-shipping">
                                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping">Ship to a
                                                different
                                                address?</label>


                                        </div>
                                    </div>

                                  
                                    <div class="form-group">
                                        <label class="order-comments">Order notes (optional)</label>
                                        <textarea name="order-notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." ></textarea>
                                    </div>
                                
                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @php  $datas = \App\Models\Cart::leftJoin('products', 'products.id', '=', 'carts.product_id')->where('user_id', null)->where('_token',csrf_token())->select('carts.*','products.product_name', 'products.sell_price','products.photos')->get();    @endphp
                                	@php $total = 0 @endphp

                                        @isset($datas)
                                        @foreach($datas as $rt)
                                         <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                {{$rt->product_name}} ×
                                                <span class="product-qty">{{$rt->qty}}</span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>Ksh {{$rt->sell_price}}</span>
                                        </td>
                                    </tr>
                                      
                                        <input type="hidden" name="total" value="{{ $total += $rt->price}}">                                        
                                        @endforeach
                                        @endisset
                                   
                                    </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <h4>Subtotal</h4>
                                        </td>

                                        <td class="price-col">
                                            <span>Ksh {{$total}}</span>
                                        </td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td class="text-left" colspan="2">
                                            <h4 class="m-b-sm">Shipping</h4>

                                            <div class="form-group form-group-custom-control">
                                                <div class="custom-control custom-radio d-flex">
                                                    <input type="radio" class="custom-control-input" name="radio" checked="">
                                                    <label class="custom-control-label">Local Pickup</label>
                                                </div>
                                                <!-- End .custom-checkbox -->
                                            </div>
                                            <!-- End .form-group -->

                                            <div class="form-group form-group-custom-control mb-0">
                                                <div class="custom-control custom-radio d-flex mb-0">
                                                    <input type="radio" name="radio" class="custom-control-input">
                                                    <label class="custom-control-label">Flat Rate</label>
                                                </div>
                                                <!-- End .custom-checkbox -->
                                            </div>
                                            <!-- End .form-group -->
                                        </td>

                                    </tr>

                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td>
                                            <b class="total-price"><span>Ksh {{$total}}</span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4 class="">Payment methods</h4>
                                <div class="info-box with-icon p-0">
                                    <p>
                                        Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.
                                    </p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                                Place order
                            </button>
                        </div>
                        <!-- End .cart-summary -->
                    </div>
                </form>
                    <!-- End .col-lg-4 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        @endsection