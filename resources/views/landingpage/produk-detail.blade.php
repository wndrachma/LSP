@extends('layouts.product')

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
              	<a class="dropdown-item" href="{{ route('review') }}">Review Product</a>
              </div>
            </li>
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
            <h1 class="mb-0 bread">Detail Product</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
				@foreach ($produkDetail as $produkD)
    			<div class="col-lg-6 mb-5 ftco-animate">
				<img src="{{ asset('storage/' . $produkD->image1_url) }}" class="img-fluid"
                                alt="{{ $produkD->product_name }}" style="width: 80%">
                        </div>
                        <div class="col-md-6" style="align-content: center">
                            <h1>{{ $produkD->product_name }}</h1>
                            <p>
                            @if ($product->discounts->isNotEmpty())
                                @foreach ($product->discounts as $discount)
                                    <span class="badge badge-success">{{ $discount->percentage }}% Off</span>
                                    <span class="discounted-price" style="display: block;">Price : Rp {{ number_format($product->price - ($product->price * $discount->percentage / 100), 0, ',', '.') }} / kg</span>
                                @endforeach
                            @else
                                <span class="price">Price : Rp {{ number_format($product->price, 0, ',', '.') }} / kg</span>
                            @endif
                            </p>
                            <P>Stok : {{ $produkD->stok_quantity }}</P>
                            <p>Description : {{ $produkD->description }}</p>
                            <form class="add-to-cart-form" action="{{ route('cart.store', $produkD->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $produkD->id }}">
                                <input type="hidden" name="price" value="{{ $produkD->price }}">
                                <button class="btn btn-sm btn-success" id="add-to-cart" 
                                    type="submit">
                                    <i class="ti-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
    </section>
		
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
  
