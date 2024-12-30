@extends('layouts.auth')

@section('title')
Next News | Register
@endsection

@section('content')
<h4>New here?</h4>
<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
<form class="pt-3" action="{{route('auth.register-proses')}}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="Name"
            value="{{old('name')}}">
        @error('name')
            <span class="text-dager">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email"
            value="{{old('email')}}">
        @error('email')
            <span class="text-dager">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" id="password"
            placeholder="Password">
        @error('password')
            <span class="text-dager">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="{{route('auth.login')}}" class="text-primary">Login</a>
    </div>
</form>
@endsection