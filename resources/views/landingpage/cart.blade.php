@extends('layouts.cart')

@section('content')
  <body class="goto-here">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block"></div>
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
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #71B533;">
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
                        <li class="nav-item cta cta-colored"><a href="{{ route('landingpage.cart') }}" class="nav-link"><span class="icon-shopping_cart"></span>[{{ count($cartItems) }}]</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <div class="hero-wrap hero-bread" style="background-image: url('lp/images/bg_1.jpg');">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">My Cart</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <form method="POST" action="{{ route('checkout.index') }}">
                            @csrf
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Choose Item</th>
                                        <th>Total</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $Total = 0;
                                    @endphp
                                    @foreach ($cartItems as $id => $item)
                                        <tr class="text-center" data-subtotal="{{ $item->product ? $item->product->getDiscounteDPrice() * $item->quantity : 0 }}">
                                            <td>{{ $id + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->product->image1_url) }}" alt="{{ $item->product->product_name }}" style="width: 50px; height: 50px;">
                                            </td>
                                            <td class="product-name">{{ $item->product->product_name ?? 'Produk tidak ditemukan' }}</td>
                                            <td class="product-price">Rp. {{ $item->product ? $item->product->getDiscounteDPrice() : 'N/A' }}</td>
                                            <td class="quantity">{{ $item->quantity }}</td>
                                            <td class="text-center">
                                                <input type="checkbox" class="large-checkbox" name="select_item[]" value="{{ $item->id }}" onchange="calculateSubtotal()">
                                            </td>
                                            <td class="total">Rp. {{ $item->product ? $item->product->getDiscounteDPrice() * $item->quantity : 'N/A' }}</td>
                                            <td class="text-center">
                                            <a href="{{ route('remove', $item->id) }}" class="btn btn-danger btn-sm remove-btn" data-id="{{ $item->id }}">Remove</a>
                                            <form></form>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('remove', $item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-end">
                                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                                    <div class="cart-total mb-3">
                                        <h3>Cart Totals</h3>
                                        <p class="d-flex">
                                            <span>Delivery</span>
                                            <span>Rp. 0</span>
                                        </p>
                                        <p class="d-flex">
                                            <span>Discount</span>
                                            <span>Rp. 0</span>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span><span id="totalAmount">{{ number_format($Total, 0, ',', '.') }}</span></span>
                                        </p>
                                    </div>
                                    <button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.large-checkbox');
            const totalElement = document.querySelector('#totalAmount');

            function updateTotal() {
                let total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        const row = checkbox.closest('tr');
                        const subtotal = parseFloat(row.getAttribute('data-subtotal'));
                        total += subtotal;
                    }
                });
                totalElement.textContent = 'Rp ' + numberFormat(total, 0);
            }

            function numberFormat(number, decimals) {
                decimals = decimals || 0;
                let formattedNumber = number.toFixed(decimals).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return formattedNumber;
            }

            // Inisialisasi total saat halaman dimuat
            updateTotal();

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateTotal);
            });
        });
    </script>

<script>
    function deleteItem(event) {
        event.preventDefault();
        const isConfirmed = confirm('Apakah Anda yakin ingin menghapus item ini?');
        if (isConfirmed) {
            const form = event.target.closest('tr').querySelector('.delete-form');
            form.submit();
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const removeButtons = document.querySelectorAll('.remove-btn');

        removeButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const itemId = this.getAttribute('data-id');
                const deleteForm = document.querySelector('#delete-form-' + itemId);
                if (deleteForm) {
                    deleteForm.submit();
                }
            });
        });
    });
</script>


@endsection

