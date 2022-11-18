@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit book</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('b_update', $book)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Book name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $book->name)}}">
                        </div>
                        <div class="img-small-ch mt-3">
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $book->photo }}" alt="Book Photo" />
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input type="text" name="description" class="form-control" value="{{old('description', $book->description)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ISBN</span>
                            <input type="text" name="ISBN" class="form-control" value="{{old('ISBN', $book->ISBN)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" multiple class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pages</span>
                            <input type="text" name="pages" class="form-control" value="{{old('pages', $book->pages)}}">
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