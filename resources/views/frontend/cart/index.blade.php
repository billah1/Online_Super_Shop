@extends('frontend.master')


@section('title','Shopping Cart')


@section('body')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}frontend/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Borrow</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Borrow </span>
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
                                <th class="shoping__product">Books</th>
                                <th>Quantity</th>
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
                                <td class="shoping__cart__item__close text-center" style="width: 20%">
                                    <a class="remove-item" onclick="return confirm('Are You sure to delete this..')" href="{{route('remove-cart-product',['id' => $cart_product->__raw_id])}}"> <span class="icon_close"></span></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('checkout') }}" class="primary-btn cart-btn">BORROW</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
