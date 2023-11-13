@extends('backend.master')

@section('title','Boook edit')


@section('body')

    <div class="row  mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Book Form</h4>
                    <hr/>
                    <h4 class="text-center text-success">{{session('sucess')}}</h4>
                    <form class="form-horizontal p-t-20" action="{{route('book.update',['id' => $book->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="categoryId">
                                    <option value="" disabled selected>-- selected category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $book->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Book Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$book->name}}" id="exampleInputuname3" placeholder="Book Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Author<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="author" value="{{$book->author}}"  id="exampleInputuname3" placeholder="Author">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label"> Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="description" id="exampleInputEmail3" placeholder=" Description">{{$book->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Quantity<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="qty" value="{{$book->qty}}"  id="exampleInputuname3" placeholder="Quantity" min="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" accept="image/*" />
                                <img src="{{asset($book->image)}}" alt="" height="100" width="130"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" {{$book->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label class="me-3"><input type="radio" name="status" {{$book->status == 0 ? 'checked' : ''}} value="0">UnPublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
