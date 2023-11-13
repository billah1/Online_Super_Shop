@extends('frontend.master')


@section('title','Checkout')



@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}frontend/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">Home</a>
                            <span>Checkout</span>
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
            <div class="row">
                <div class="col-md-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="cash-tab" data-toggle="tab" data-target="#cash" type="button" >Cash On Delivery</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                          <form action="{{route('new-cash-order')}}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="checkout__input">
                                          <label>Full Name</label>
                                          @if(isset($customer->id))
                                          <input type="text" required name="name" value="{{$customer->name}}" readonly placeholder="Full Name">
                                          @else
                                              <input type="text" required name="name" placeholder="Full Name">
                                              <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="checkout__input">
                                          <p>Email<span>*</span></p>
                                          @if(isset($customer->id))
                                          <input type="email" required name="email" value="{{$customer->email}}" readonly placeholder="Email">
                                          @else
                                              <input type="email" required name="email" placeholder="Email">
                                              <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="checkout__input">
                                          <p>Phone Number<span>*</span></p>
                                          @if(isset($customer->id))
                                          <input type="number" required name="mobile" value="{{$customer->mobile}}" readonly placeholder="Phone Number">
                                          @else
                                              <input type="number" required name="mobile" placeholder="Phone Number">
                                              <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="ml-3 mt-3">
                                    <div class="checkout__input__checkbox">
                                        <label for="checkbox-3">
                                            I accept all terms & conditions
                                            <input type="checkbox" id="checkbox-3" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="single-form button">
                                          <button type="submit" class="btn btn-success" >Borrow Order</button>
                                      </div>
                                  </div>

                              </div>

                          </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Checkout Section End -->

@endsection
