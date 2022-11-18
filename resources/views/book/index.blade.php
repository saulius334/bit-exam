@extends('layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>All books</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($books as $book)
                        <li class="list-group-item">
                            <div class="book-list">
                                <div class="content">
                                    <h2><span>Book name: </span>{{$book->name}}</h2>
                                    <h4><span>Category: </span>{{ $book->getCategory() }}</h4>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('b_show', $book)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role == 2)
                                    <a href="{{route('b_edit', $book)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('b_delete', $book)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No books found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
