@extends('frontend.master')


@section('title','product-detail')


@section('body')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}frontend/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Book’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Book</a>
                        <span>Book's Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{ asset($book->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$book->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>{{$book->category->name}}</span>
                    </div>
                    <div class="product__details__price">Quantity : {{$book->qty}}</div>
                    <p>{{$book->description}}</p>
                    <form action="{{route('add-to-cart',['id' => $book->id])}}" method="post">
                        @csrf
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="form-group qty">
                                <input type="number" name="qty" class="form-control" value="1" min="1" placeholder="product Quantity">
                            </div>
                        </div>
                    </div>

                            <button type="submit" class="primary-btn">Borrow </button>
                            <button type="button" class="heart-icon"><span class="icon_heart_alt"></span></button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->


@endsection
