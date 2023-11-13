@extends('frontend.master')


@section('title','Organi Vegetable Shop')


@section('body')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach( $categories as $category)
                        <li><a href="{{ route('book-category',['id'=>$category->id]) }}">{{$category->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{ asset('/') }}frontend/img/hero/banner.jpg">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Book</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Book</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset($book->image) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('book-detail',['id' => $book->id]) }}">{{$book->name}}</a></h6>
                        <h5>Author :{{$book->author}}</h5>
                        <h5>Quantity :{{$book->qty}}</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->


@endsection
