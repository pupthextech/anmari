@extends('user/layout')

@section('content')

<div class="container mt-4">
    @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <form method="POST" action="{{ route('verifyLogin') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 mr-4">
            <a href="">Register</a>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

@endsection