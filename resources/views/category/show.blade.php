@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Category: {{$category->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="camp-show">
                        <div class="line"><small>Category name:</small>
                            <h5>{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection