@extends('layout.master')
@if(auth()->check())
    @section('content')
       <lable>title :</lable>
        <h1>{{$article->title}}</h1>
        <lable>text :</lable>
       @php
        echo $article->text;
        @endphp
        <lable>Created Date :</lable>
        <p>{{$article->created_at}}</p>
        <lable>Creator :</lable>
        <p>{{$article->user_email}}</p>
    @endsection
@else
<h3>You Need to login first</h3>
@endif
