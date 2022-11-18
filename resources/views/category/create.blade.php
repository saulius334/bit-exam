@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New category</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_store')}}" method="post" enctype="multipart/form-data" class="--form">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Category name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4 --submit">Create category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
