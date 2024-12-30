@extends('layouts.auth')

@section('title')
Next News | Login
@endsection

@section('content')
<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Login in to continue.</h6>
<form class="pt-3">
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="mt-3">
        <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('auth.register')}}" class="text-primary">Create</a>
    </div>
</form>
@endsection
