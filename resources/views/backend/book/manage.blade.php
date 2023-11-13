@extends('backend.master')

@section('title','Manage Book')

@section('body')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product Information</h4>
                    <div class="table-responsive m-t-40">
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->qty}}</td>
                                    <td><img src="{{asset($book->image)}}" alt="{{$book->name}}" height="50" width="80"/></td>
                                    <td>{{$book->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>

                                        <a href="{{route('book.edit', ['id' => $book->id])}}" class="btn btn-success btn-sm">
                                            <i class="ti-reddit"></i>
                                        </a>
                                        <a href="{{route('book.delete', ['id' => $book->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
