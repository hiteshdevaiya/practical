@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="cart-container">
                <h2>Your Shopping Cart</h2>
                <table id="cart-table">
                    <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cart) > 0)
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $key => $cart_one)
                                <tr data-product-id="{{ $key }}">
                                    <td>{{ $cart_one['brand'] }}</td>
                                    <td>{{ $cart_one['name'] }}</td>
                                    <td>
                                        <input type="number" value="{{ $cart_one['quantity'] }}" min="1" class="quantity" />
                                    </td>
                                    <td>₹{{ $cart_one['price'] }} x {{ $cart_one['quantity'] }}</td>
                                    <td>₹{{ $cart_one['price'] * $cart_one['quantity'] }}</td>
                                    <td>
                                        <button class="btn btn-outline-dark mt-auto update-cart">Update</button>
                                        <a class="btn btn-outline-dark mt-auto" href="{{ route('cart.remove', $key) }}">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $total += ( $cart_one['price'] * $cart_one['quantity']);
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4">Total Price</td>
                                <td>₹{{ $total }}</td>
                                <td></td>
                            </tr>
                        @else
                            <tr >
                                <td colspan="5" class="text-center">No products found</td>
                            </tr>

                        @endif
                    </tbody>
                </table>
                @if(count($cart) > 0)
                    <div class="col-md-12 justify-content-center mt-3">
                        <a href="{{ route('place.order') }}" class="btn btn-outline-dark" id="checkout-btn">Proceed to Checkout</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <input type="hidden" id="update_route" value="{{ route('cart.update') }}" />
@endsection
