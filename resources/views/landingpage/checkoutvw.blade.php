@extends('layouts.order')

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
                    <!-- Tambahkan item menu lainnya di sini -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('lp/images/bg_1.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="page-section product" id="product">
        <div class="container">
            <!-- Checkout Section Heading-->
            <div class="divider-custom" style="margin-top: 100px; margin-bottom: 80px;">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Checkout</h2>
            </div>
            <!-- Checkout Grid Items-->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    <form action="{{ route('checkoutvw.store') }}" method="POST" id="checkoutForm">
                        @csrf
                        @php
                            $Total = 0;
                        @endphp
                        @foreach ($cartItems as $index => $item)
                            @php
                                $discountedPrice = $item->discounted_price;
                                $subtotal = $item->quantity * $discountedPrice;
                                $Total += $subtotal;
                            @endphp
                            <div class="checkout-item mb-4 p-3 border">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-img-container">
                                            @if($item->produk && $item->produk->image1_url)
                                                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $item->produk->image1_url) }}" alt="{{ $item->produk->product_name }}">
                                            @else
                                                <img class="card-img-top img-fluid" src="path/to/default/image.jpg" alt="Default Image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div>
                                            @if($item->produk && $item->produk->product_name)
                                                <h5 class="product-name">{{ $item->produk->product_name }}</h5>
                                            @else
                                                <h5 class="product-name">Produk tidak ditemukan</h5>
                                            @endif
                                            <div class="quantity">Quantity: {{ $item->quantity }} kg</div>
                                            <div class="price">Price: Rp{{ number_format($discountedPrice, 0, ',', '.') }}</div>
                                            <div class="subtotal">Subtotal: Rp{{ number_format($subtotal, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="total">
                            <h4>Total: Rp{{ number_format($Total, 0, ',', '.') }}</h4>
                        </div>
                        <input type="hidden" name="total_amount" value="{{ $Total }}">
    
                        <!-- Payment Form Fields -->
                        <h4 class="text-center mt-4">Payment Information</h4>
                        <br>
                        <div class="form-group">
                            <label for="payment_date">Payment Date</label>
                            <input type="datetime-local" class="form-control" id="payment_date" name="payment_date" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="">Select Payment Method</option>
                                <option value="Cash - Tunai">Cash - Tunai</option>
                                <option value="Transfer - Non Tunai">Transfer - Non Tunai</option>
                            </select>
                        </div>
    
                        @if (session('order_placed'))
                            <button type="button" class="btn btn-lg btn-secondary mt-3" onclick="window.location='{{ route('landingpage.produk') }}'">Back to Shopping</button>
                        @else
                            <button type="submit" class="btn btn-lg btn-primary mt-3">Make an Order</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container text-center">
            <p>
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> 
                All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
        </div>
    </footer>
</body>
@endsection
<script>
    document.getElementById('checkoutForm').addEventListener('submit', function() {
        document.querySelector('button[type="submit"]').disabled = true;
    });
</script>
