@extends('layout.master')
@section('content')
    <br>
    <div id="divvv">
        <h1>Create Article</h1>
    @if($errors->any())

            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form class="form-group" action="/" method="post">
            @csrf
            <label for="car">Title : </label>
            <input type="text"  name="title">
            <textarea id="text" name="text"></textarea>
            <br>
            <label for="car">Category : </label>

            <select name="cat_id" id="cat_id">
                @foreach($cats as $object)
                    <option value="{{ $object->id}}"> {{$object->name}}</option>
                @endforeach
            </select>
            <br>

            <button class="btn btn-danger" type="submit">submit</button>
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
