@extends('layout.master')
@section('content')
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>



@foreach($articles as $article)
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="card-text">
                @php echo ($article->text);
                @endphp</p>
            <a href="http://127.0.0.1:8000/show/{{$article->id}}" class="btn btn-primary">Read More &</a>
        </div>
        <div class="card-footer text-muted">
            {{$article->created_at}} by
            <a href="http://127.0.0.1:8000/searchbyuser/{{$article->email}}">{{$article->email}}</a>
        </div>
    </div>
@endforeach
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
