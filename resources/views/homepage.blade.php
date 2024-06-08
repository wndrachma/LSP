@extends('layouts.home')

@section('content')
  <body class="goto-here">
		<!-- <div class="py-1 bg-primary"> -->
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('homepage') }}">GreenMarket</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ route('homepage') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ route('shop') }}">Shop</a>
              	<a class="dropdown-item" href="{{ route('wish.index') }}">Wishlist</a>
              </div>
            </li>
            <li class="nav-item"><a href="{{ route('review') }}" class="nav-link">Review</a></li>
	          <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About</a></li>
	          <li class="nav-item mx-0 mx-lg-1 py-3 px-0 px-lg-3 rounded text-white">
                        @if (Auth::guard('customers')->check())
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #71B533;">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="">{{ Auth::guard('customers')->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>
                                </ul>
                            </div>
                        @else
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link rounded"
                            href="{{route('register')}}">Register</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link rounded"
                            href="{{route('login')}}">Login</a></li>
                    @endif
                    </li>
	          <li class="nav-item cta cta-colored"><a href="{{ route('landingpage.cart') }}" class="nav-link"><span class="icon-shopping_cart"></span></a></li>

	        </ul>
	      </div>
	    </div>

	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(lp/images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="{{ route('about.index') }}" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(lp/images/bg_4.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="{{ route('about.index') }}" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over Rp.30.000.00,-</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>We stock the finest selections from local gardens to ensure unmatched freshness and quality. </p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
			<div class="row">
				@foreach ($products as $product)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="{{ route('produk.detail', $product->id) }}" class="img-prod"><img class="img-fluid" src="{{ asset('storage/' . $product->image1_url) }}" alt="Colorlib Template" style="width: 250px; height: 230px;">
    						<!-- <span class="status">30%</span>
    						<div class="overlay"></div> -->
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="{{ route('produk.detail', $product->id) }}">{{ $product->product_name }}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
								<p class="price"><span>Rp {{ $product->price}} /kg</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="{{ route('produk.detail', $product->id) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">
									<span><i class="ion-ios-cart"></i></span>
									</a>
									<form id="add-to-cart-form-{{ $product->id }}" action="{{ route('cart.store', $product->id) }}" method="POST" style="display: none;">
										@csrf
										<input type="hidden" name="quantity" value="1">
									</form>
	    							<a href="{{ route('wish.index') }}" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				@endforeach
    		</div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(lp/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(lp/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(lp/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(lp/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(lp/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">We stock the finest selections from local gardens to ensure unmatched freshness and quality. , there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">GreenMarket</h2>
              <p>We stock the finest selections from local gardens to ensure unmatched freshness and quality. </p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
        </div>
      </div>
    </footer>
	<div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
    @endsection

