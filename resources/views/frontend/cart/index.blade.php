@extends('frontend.master')


@section('title','Shopping Cart')


@section('body')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}frontend/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>SubTotal</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        @foreach($cart_products as $cart_product)
                            <tr>
                                <td class="shoping__cart__item" style="width: 20%">
                                    <img src="{{ asset($cart_product->image) }}" alt="" style="height: 60px">
                                    <h5>{{$cart_product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price" style="width: 20%">
                                    ${{$cart_product->price}}
                                </td>
                                <td class="shoping__cart__quantity" style="width: 20%">
                                    <div class="quantity">
                                        <form action="{{route('update-cart-product',['id' =>$cart_product->__raw_id])}}" method="post">
                                            @csrf
                                        <div class="pro-qty">
                                            <input type="text"  value="{{$cart_product->qty}}" name="qty" min="1" required>

                                        </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total" style="width: 20%">
                                    ${{$cart_product->price * $cart_product->qty}}
                                </td>
                                <td class="shoping__cart__item__close text-center" style="width: 20%">
                                    <a class="remove-item" onclick="return confirm('Are You sure to delete this..')" href="{{route('remove-cart-product',['id' => $cart_product->__raw_id])}}"> <span class="icon_close"></span></a>

                                </td>
                            </tr>
                            @php($sum = $sum +$cart_product->price * $cart_product->qty)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>${{$sum}}</span></li>
                        <li>Tax(15%) <span>${{$tax = round((($sum * 15)/100))}}</span></li>
                        <li>Shipping <span>${{$shipping = 100}}</span></li>
                        <li>Total Payable <span>${{$total = $sum + $tax+ $shipping}}</span></li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
