@extends('backend.master')


@section('body')
    <div class="row mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Orders Information</h4>
                <hr>

                @if (Session::get('noti'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('noti') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                @if (Session::get('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('msg') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('admin.order-update',['id' => $order->id])}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Customer Information</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="{{$order->customer->name .' (' . $order->customer->mobile . ')'}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Order ID</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="{{$order->id}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label">Order Status</label>
                        <div class="col-md-9">
                            <select name="order_status" class="form-control">
                                <option value="Pending" {{$order->order_status == "Pending" ? 'selected' : ''}}>Pending</option>
                                <option value="Approved" {{$order->order_status == "Approved" ? 'selected' : ''}}>Approved</option>
                                <option value="Reject" {{$order->order_status == "Reject" ? 'selected' : ''}}>Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 form-label"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success w-100" value="Update borrow">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

