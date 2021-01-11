@extends('layout.master')

@section('content')
    <form method="get" action="http://127.0.0.1:8000/email/">


        <div class="form-group">
            <label for="code" class="form-control">{{ __('Email') }}</label>
            <input id="email" type="text" class="form-control" name="email">
            <button type="submit" class="btn btn-danger">Submit</button>
@endsection
