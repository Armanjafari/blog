@extends('layout.master')
@section('content')
   <h1>All Articles</h1>
    <table class="table">
<thead>
<tr>
    <th>id</th>
    <th>Article</th>
    <th>Category</th>
    <th>...</th>

</tr>
</thead>
        <tbody>
        <tr>
            @foreach($articles as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->text}}</td>
                    <td>{{$item->cat_id}}</td>
                    <td>
                    <form action="http://127.0.0.1:8000/all/delete/{{$item->id}}" method="post" class="form-group">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form></td>
                    <td>
                        <a class="btn btn-light" href="http://127.0.0.1:8000/edit/{{$item->id}}">Update</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
