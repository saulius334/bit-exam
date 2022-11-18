@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$camp->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="camp-show">
                        <div class="line"><small>Name:</small>
                            <h5>{{ $book->name }}</h5>
                        </div>
                        <div class="line"><small>Number of Rooms:</small>
                            <h5>{{ $book->description }}</h5>
                        </div>
                        <div class="line"><small>ISBN:</small>
                            <h5>{{ $book->ISBN }}</h5>
                        </div>
                        <div class="img-small-ch mt-3">
                            <div class="img">
                                <img class="w-25 mb-3" src="/storage/{{ $book->photo }}" alt="Book Photo" />
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="{{route('b_reserve', $book)}}" class="btn btn-info">Reserve</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection