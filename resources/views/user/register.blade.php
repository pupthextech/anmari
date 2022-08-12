@extends('user/layout')

@section('content')

<div class="container mt-4">
    @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <form method="POST" action="{{ route('verifyRegistration') }}">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
            @if ($errors->has('first_name'))
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
            @if ($errors->has('last_name'))
                <span class="text-danger">{{ $errors->first('last_name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="mobile_num" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="mobile_num" name="mobile_num">
            @if ($errors->has('mobile_num'))
                <span class="text-danger">{{ $errors->first('mobile_num') }}</span>
            @endif
        </div> 
        <div class="mb-3">
            <label for="email" class="form-label">E-mail Address</label>
            <input type="email" class="form-control" id="email" name="email">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div> 
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div> 
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" aria-label="Gender Select" id="gender" name="gender">
                <option disabled selected value>Select one...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @if ($errors->has('gender'))
                <span class="text-danger">{{ $errors->first('gender') }}</span>
            @endif
        </div> 
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" name="username">
            @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

@endsection