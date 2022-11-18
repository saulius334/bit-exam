@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$book->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="book-show">
                        <div class="line"><small>Name:</small>
                            <h5>{{ $book->name }}</h5>
                        </div>
                        <div class="line"><small>Description:</small>
                            <h5>{{ $book->description }}</h5>
                        </div>
                        <div class="line"><small>ISBN:</small>
                            <h5>{{ $book->isbn }}</h5>
                        </div>
                        <div class="line"><small>Number of pages:</small>
                            <h5>{{ $book->pages }}</h5>
                        </div>
                        <div class="img-small-ch mt-3">
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $book->photo }}" alt="Book Photo" />
                            </div>
                        </div>
                        <div class="buttons">
                            <form action="{{route('b_reserve', $book)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info mb-3">Reserve</button>
                            </form>
                            <form action="{{route('b_favorite', $book)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info">Add to favorites</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection