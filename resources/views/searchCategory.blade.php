@extends('layout.master')

@section('content')
    @foreach($data->articles()->all() as $item)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{$item->text}}</h2>
                <p class="card-text">{{$item->text}}</p>
                <a href="http://127.0.0.1:8000/show/{{$item->id}}" class="btn btn-primary">Read More &</a>
            </div>
            <div class="card-footer text-muted">
                {{$item->created_at}} by
                <a href="http://127.0.0.1:8000/searchbyuser/{{$item->email}}">{{$item->email}}</a>
            </div>
        </div>
    @endforeach
@endsection
