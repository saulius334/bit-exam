@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit category</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_update', $category)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Category name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $category->name)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4 --submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection