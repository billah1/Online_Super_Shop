@extends('frontend.master')


@section('title','Customer Dashboard')



@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}frontend/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Dashboard</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">Home</a>
                            <span>Complete Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">Profile</a>
                        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action">Order</a>
                        <a href="#" class="list-group-item list-group-item-action">Account</a>
                        <a class="list-group-item list-group-item-action disabled">Change Password</a>
                        <a class="list-group-item list-group-item-action disabled">Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th>Delivery Address</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>1</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->delivery_address}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <a href="" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Checkout Section End -->

@endsection
