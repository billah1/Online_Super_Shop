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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="online-tab" data-toggle="tab" data-target="#online" type="button" >Online</button>
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
                                  <div class="col-lg-12">
                                      <div class="checkout__input">
                                          <p>Delivary Address<span>*</span></p>
                                          <textarea  placeholder="Order Delivery Address" style="padding-top: 10px;" rows="5" cols="90" name="delivery_address"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">

                                          <p>Payment Type</p>
                                          <div class="form-check form-check-inline">
                                              <input class="form-check-input" checked type="radio" name="payment_type"  value="1">
                                              <label class="form-check-label" >Cash On Delivary</label>
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
                                          <button type="submit" class="btn btn-success" >Confirm Order</button>
                                      </div>
                                  </div>

                              </div>

                          </form>


                        </div>

                        <div class="tab-pane fade px-32" id="online" role="tabpanel" aria-labelledby="online-tab">
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Full name</label>
                                        <input type="text" name="name" class="form-control" id="customer_name" placeholder="your name" required>
                                        <div class="invalid-feedback">
                                            Valid customer name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mobile">Mobile</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+88</span>
                                        </div>
                                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your Mobile number is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com"  required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="delivery_address" placeholder="Delivery Address" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="state">Country</label>
                                        <select class="custom-select w-100" id="state" required>
                                            <option value="">Choose...</option>
                                            <option value="Dhaka">Bangladesh</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select class="custom-select w-100" id="state" required>
                                            <option value="">Choose...</option>
                                            <option value="Dhaka">Dhaka</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <p>Payment Type</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="payment_type"  value="2">
                                        <label class="form-check-label" >Online</label>
                                    </div>

                                </div>
                                <div class="ml-3 mt-3">
                                    <div class="checkout__input__checkbox">
                                        <label for="checkbox-33">
                                            I accept all terms & conditions
                                            <input type="checkbox" id="checkbox-33" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Continue to checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                        <div class="checkout__order">
                            <h4>Shopping Cart Summery</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            @php($total =0)
                            @foreach(ShoppingCart::all() as $item)
                            <ul>
                                <li>
                                    {{$item->name}}<span>${{$item->price * $item->qty}}</span></li>

                            </ul>
                                @php($total = $total +($item->price * $item->qty))
                            @endforeach
                            <div class="checkout__order__subtotal">Subtotal <span>${{$total}}</span></div>
                            <div class="checkout__order__subtotal">Tax(15%) <span>${{$tax = ($total * 15)/100}}</span></div>
                            <div class="checkout__order__subtotal">Shipping <span>${{$shipping = 100}}</span></div>
                            <div class="checkout__order__total">Total Payable <span>${{$orderTotal = $total + $tax + $shipping}}</span></div>
                            <?php
                                    Session::put('order_total',$orderTotal);
                                    Session::put('tax_total',$tax);
                                    Session::put('shipping_total',$shipping);


                            ?>

                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>

                </div>
            </div>





        </div>

    </section>
    <!-- Checkout Section End -->

@endsection
