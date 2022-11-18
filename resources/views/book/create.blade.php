@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New book</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('b_store')}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Book name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input type="text" name="description" class="form-control" value="{{old('description')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ISBN</span>
                            <input type="text" name="isbn" class="form-control" value="{{old('isbn')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pages</span>
                            <input type="text" name="pages" class="form-control" value="{{old('pages')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Category</span>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $catogory)
                                <option value="{{$catogory->id}}">{{$catogory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4 --submit">Create book</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
