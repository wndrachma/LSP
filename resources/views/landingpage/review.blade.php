@extends('layouts.review')

@section('content')

<body class="goto-here">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
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
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link rounded" href="{{route('register')}}">Register</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link rounded" href="{{route('login')}}">Login</a></li>
                        @endif
                    </li>
                    <li class="nav-item cta cta-colored"><a href="{{ route('landingpage.cart') }}" class="nav-link"><span class="icon-shopping_cart"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('lp/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Product Review</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
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
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
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
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
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
        <section class="page-section product" id="product">
        <div class="container">
            <!-- product Section Heading-->

            <div class="divider-custom" style="margin-top: 100px; margin-bottom: 80px;">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Review Product</h2>
            </div>
            <!-- product Grid Items-->
            <div class="row justify-content-center">

            </div>
            <!-- start logic for showing product -->
            <form action="{{ route('review.store') }}" method="POST" id="frmReview">
                @csrf
                <div class="mb-3 ms-3 me-3">
                    <label class="form-label" for="customer_id">Customer Id</label>
                    <!-- Menggunakan input tersembunyi untuk menyimpan ID pelanggan -->
                    <input type="hidden" name="customer_id" id="customer_id" value="{{ $customer->id }}">
                    <p>{{ $customer->name }}</p> <!-- Menampilkan nama pelanggan yang sedang login -->
                </div>
                <div class="mb-3 ms-3 me-3">
                    <label class="form-label" for="product_id">Product Id</label>
                    <select class="form-control" name="product_id" id="product_id" required>
                        <option selected disabled>Select Product</option>
                        @foreach ($product_name as $pn)
                            <option value="{{ $pn->id }}">{{ $pn->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 ms-3 me-3">
                    <label for="rating">Rating</label>
                    <div id="rating" class="rating">
                        <input type="radio" id="star1" name="rating" value="1" required style="display: none;"/>
                        <label for="star1" title="1 stars"><i class="fas fa-star" onclick="handleStarClick(1)"></i></label>
                        <input type="radio" id="star2" name="rating" value="2" style="display: none;"/>
                        <label for="star2" title="2 stars"><i class="fas fa-star" onclick="handleStarClick(2)"></i></label>
                        <input type="radio" id="star3" name="rating" value="3" style="display: none;"/>
                        <label for="star3" title="3 stars"><i class="fas fa-star" onclick="handleStarClick(3)"></i></label>
                        <input type="radio" id="star4" name="rating" value="4" style="display: none;"/>
                        <label for="star4" title="4 stars"><i class="fas fa-star" onclick="handleStarClick(4)"></i></label>
                        <input type="radio" id="star5" name="rating" value="5" style="display: none;"/>
                        <label for="star5" title="5 star"><i class="fas fa-star" onclick="handleStarClick(5)"></i></label>
                    </div>
                </div>
                <div class="mb-3 ms-3 me-3">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                </div>
                <button type="submit" id="makervw" class="btn btn-lg btn-primary mb-3 ms-3 me-3">Make a Review</button>
            </form>
            <!-- end logic for show product -->
        </div>
    </section>
    <!-- Review Section -->
    <section class="page-section product">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary">Review from Customer</h2>
            @foreach ($product_reviews as $review)
                <div class="mb-3 ms-3 me-3">
                    <div class="card-header pt-3">{{ $review->customer->name }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->product->product_name }}
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                        </h5>
                        <p class="card-text">{{ $review->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="row">
        <div class="col-md-12 text-center">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</body>
@endsection

<script>
    function handleStarClick(rating) {
        // Ambil semua ikon bintang
        const stars = document.querySelectorAll('.fas.fa-star');

        // Tandai bintang yang dipilih
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('clicked');
        }

        // Hapus tanda dari bintang yang tidak dipilih
        for (let i = rating; i < stars.length; i++) {
            stars[i].classList.remove('clicked');
        }

        // Tandai bintang terpilih di input radio
        const radioInput = document.getElementById('star' + rating);
        radioInput.checked = true;
    }
</script>
