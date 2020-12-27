@extends('layout.master')
@section('content')
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>



@foreach($articles as $article)
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$article->text}}</h2>
            <p class="card-text">{{$article->text}}</p>
            <a href="http://127.0.0.1:8000/show/{{$article->id}}" class="btn btn-primary">Read More &</a>
        </div>
        <div class="card-footer text-muted">
            {{$article->created_at}} by
            <a href="#">Start Bootstrap</a>
        </div>
    </div>
@endforeach
{{$userdata}}
    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>


@endsection
