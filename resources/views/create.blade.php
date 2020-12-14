@extends('layout.master')
@section('content')
    <br>
    <div id="divvv">
        <form action="index" method="post">
            @csrf
            <textarea id="text" name="text"></textarea>
            <br>
            <label for="car">Category : </label>

            <select name="cat_id" id="cat_id">
            </select>
            <br>
            <button type="submit">submit</button>
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
