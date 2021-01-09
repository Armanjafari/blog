@extends('layout.master')

@section('content')
    <form method="POST" action="http://127.0.0.1:8000/loginwithcode/">
        @csrf
        <label for="email" class="form-control">{{ __('email') }}</label>
        <input id="email" type="email" class="form-control" name="email">
        <div class="form-group">
            <label for="code" class="form-control">{{ __('Code') }}</label>
                <input id="code" type="number" class="form-control" name="code">

        <button type="submit" class="btn btn-danger">Submit</button>

@endsection
