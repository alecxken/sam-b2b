		@isset($prod)
<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
	<div class="row">
		<div class="col-md-6 product-single-gallery mb-md-0">
			<div class="product-slider-container">
				<div class="label-group">
					<div class="product-label label-hot">HOT</div>
					<!---->
					<div class="product-label label-sale">
						-16%
					</div>
				</div>

				<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
			
				
					<div class="product-item" style="height: 400px; width: 400px;">
						<img class="product-single-image" src="/products/{{$prod->photos}}"
							data-zoom-image="/products/{{$prod->photos}}" />
					</div>
			
					<!-- <div class="product-item">
						<img class="product-single-image" src="assets/images/products/zoom/product-2-big.jpg"
							data-zoom-image="assets/images/products/zoom/product-2-big.jpg" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="assets/images/products/zoom/product-3-big.jpg"
							data-zoom-image="assets/images/products/zoom/product-3-big.jpg" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="assets/images/products/zoom/product-4-big.jpg"
							data-zoom-image="assets/images/products/zoom/product-4-big.jpg" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="assets/images/products/zoom/product-5-big.jpg"
							data-zoom-image="assets/images/products/zoom/product-5-big.jpg" />
					</div> -->
				</div>
				<!-- End .product-single-carousel -->
			</div>
			<div class="prod-thumbnail owl-dots">
				<div class="owl-dot" style="height: 100px; width: 100px;">
					<img src="products/{{$prod->photos}}" />
				</div>
				<div class="owl-dot">
					<img src="assets/images/products/zoom/product-2.jpg" />
				</div>
				<div class="owl-dot">
					<img src="assets/images/products/zoom/product-3.jpg" />
				</div>
				<div class="owl-dot">
					<img src="assets/images/products/zoom/product-4.jpg" />
				</div>
				<div class="owl-dot">
					<img src="assets/images/products/zoom/product-5.jpg" />
				</div>
			</div>
		</div><!-- End .product-single-gallery -->

		<div class="col-md-6">
			<div class="product-single-details mb-0 ml-md-4">
				<h1 class="product-title">{{$prod->product_name}}</h1>

				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:60%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( 6 Reviews )</a>
				</div><!-- End .ratings-container -->

				<hr class="short-divider">

				<div class="price-box">
					<span class="product-price">Kes {{$prod->sell_price}}</span>
				</div><!-- End .price-box -->

				<div class="product-desc">
					<p>
						{{$prod->description}}.
					</p>
				</div><!-- End .product-desc -->

				<ul class="single-info-list">
					<!---->
					<li>
						SKU:
						<strong>{{$prod->token}}</strong>
					</li>

					<li>
						CATEGORY:
						<strong>
							<a href="#" class="product-category">{{$prod->category}}</a>
						</strong>
					</li>
				</ul>

				<div class="product-filters-container">
					<div class="product-single-filter">
						<label>Size:</label>
						<ul class="config-size-list">
							<li><a href="javascript:;" class="d-flex align-items-center justify-content-center">XL</a>
							</li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">L</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">M</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">S</a></li>
						</ul>
					</div>

					<div class="product-single-filter">
						<label></label>
						<a class="font1 text-uppercase clear-btn" href="#">Clear</a>
					</div>
					<!---->
				</div>
				<form method="post" action="add-to-cart">
					@csrf

					
				<input type="hidden" name="session" value="{{ session()->get('key') }}">

				<input type="hidden" name="product_id" value="{{ $prod->id }}">

				<input type="hidden" name="sell_price" value="{{ $prod->sell_price }}">

				<div class="product-action">
					<div class="price-box product-filtered-price">
						<!-- <del class="old-price"><span>$286.00</span></del> -->
						<span class="product-price">Ksh {{$prod->sell_price}}</span>
					</div>

					<div class="product-single-qty">
						<input class="horizontal-quantity form-control" type="text" name="qty" />
					</div><!-- End .product-single-qty -->

					<button type="submit" class="btn btn-dark "  title="Add to Cart">Add to Cart</button>

					<!-- <a href="cart.html" class="btn view-cart d-none">View cart</a> -->
				</div><!-- End .product-action -->
				</form>

				<hr class="divider mb-0 mt-0">

				
				<!-- End .product single-share -->
			</div>
		</div><!-- End .product-single-details -->

		<button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
	</div><!-- End .row -->
</div><!-- End .product-single-container -->
	
					@endisset