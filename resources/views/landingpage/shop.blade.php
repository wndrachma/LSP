@extends('layouts.shop')

@section('content')

  <body class="goto-here">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
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
	          <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link">Home</a></li>
	          <li class="nav-item active dropdown">
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

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('lp/images/bg_1.jpg') }}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Product</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="{{ route('shop') }}" class="active">All</a></li>
						@foreach ($categori as $category)
						<li><a href="{{ route('shop.category', $category->id) }}">{{ $category->category_name }}</a></li>
						@endforeach
    				</ul>
    			</div>
    		</div>
    		<div class="row">
			@foreach ($produk as $produkD)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{ route('produk.detail', $produkD->id) }}" class="img-prod"> <img src="{{ asset('storage/' . $produkD->image1_url) }}" width="250px" height="230px" alt="Colorlib Template">
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="/produk-detail/{{ $produkD->id }}">{{ $produkD->product_name}}</a></h3>
    						<p class="card-text">
                            @if ($produkD->discounts->isNotEmpty())
                                @foreach ($produkD->discounts as $discount)
                                    <span class="badge bg-danger">{{ $discount->percentage }}% Off</span>
                                    <del class="text-muted">Rp {{ number_format($produkD->price, 0) }} /Kg</del>
                                    <span class="discounted-price">Rp{{ number_format($produkD->price - ($produkD->price * $discount->percentage / 100), 0) }} /Kg</span>
                                @endforeach
                            @else
                                <span class="price">Rp {{ number_format($produkD->price, 0) }} /Kg</span>
                            @endif
                        </p>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="{{ route('produk.detail', $produkD->id) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $produkD->id }}').submit();">
									<span><i class="ion-ios-cart"></i></span>
									</a>
									<form id="add-to-cart-form-{{ $produkD->id }}" action="{{ route('cart.store', $produkD->id) }}" method="POST" style="display: none;">
										@csrf
										<input type="hidden" name="quantity" value="1">
									</form>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
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

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      			</div>
          	</div>
			<div class="row">
          <div class="col-md-12 text-center">
		  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>
        </div>
        </div>
      </div>
    </footer>
   @endsection 