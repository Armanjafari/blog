@extends('layout.master')
@section('content')
    <br>
    <div id="divvv">
        <h1>Edit Article</h1>
        @if($errors->any())

            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form class="form-group" action="/edit/{{$article->id}}" method="post">
            @csrf
            @method('put')
            <label for="car">Title : </label>
            <input type="text"  name="title" value="{{$article->title}}">
            <textarea id="text" name="text">{{$article->text}}</textarea>
            <br>
            <label for="car">Category : </label>

            <select name="cat_id" id="cat_id" class="form-control">
                @foreach($cats as $object)
                    <option value="{{ $object->id}}"> {{$object->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="car">Tag : </label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach($tags as $object)
                    <option value="{{ $object->id}}" {{ in_array($object->id , $article->tags()->pluck('id')->toArray()) ? 'selected' : ""}}> {{$object->name}}</option>
                @endforeach
            </select>
            <br>
            <button class="btn btn-light" type="submit">Update</button>
        </form>
    </div>



    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#text' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
