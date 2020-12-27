@extends('layout.master')
@if(auth()->check())
    @section('content')
       <lable>title :</lable>
        <h1>{{$article->title}}</h1>
        <lable>text :</lable>
        <p>{{$article->text}}</p>
        <lable>Created Date :</lable>
        <p>{{$article->created_at}}</p>
        <lable>Creator :</lable>
        <p>{{$article->creator}}</p>
    @endsection
@else
<h3>You Need to login first</h3>
@endif
