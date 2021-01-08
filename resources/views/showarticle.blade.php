@extends('layout.master')
@if(auth()->check())
    @section('content')
       <label>title :</label>
        <h1>{{$article->title}}</h1>
        <lable>text :</lable>
       @php
        echo $article->text;
        @endphp
        <label>Created Date :</label>
        <p>{{$article->created_at}}</p>
        <label>Creator :</label> <br>
       <a href="http://127.0.0.1:8000/searchbyuser/{{$article->email}}">{{$article->email}}</a> <br>

        <label> Tags : </label><br>

       @foreach($article->tags()->get() as $tags)

           <a href="http://127.0.0.1:8000/searchbytag/{{$tags->id}}"><label>{{$tags->name}} , </label></a>


       @endforeach

    @endsection
@else
<h3>You Need to login first</h3>
@endif
