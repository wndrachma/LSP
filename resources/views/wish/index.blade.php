@extends('layouts.shop')

@section('content')
<div class="container">
    <div class="hero-wrap hero-bread" style="background-image: url('lp/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Product List</th>
                                    <th>&nbsp;</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlists as $wishlist)
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <form action="{{ route('wish.destroy', $wishlist->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><span class="ion-ios-close"></span></button>
                                        </form>
                                    </td>
                                    <td class="image-prod">
                                        <div class="img" style="background-image:url({{ $wishlist->product->image_url }});"></div>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $wishlist->product->name }}</h3>
                                        <p>{{ $wishlist->product->description }}</p>
                                    </td>
                                    <td class="price">${{ $wishlist->product->price }}</td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100" readonly>
                                        </div>
                                    </td>
                                    <td class="total">${{ $wishlist->product->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
