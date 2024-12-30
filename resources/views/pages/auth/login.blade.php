@extends('layouts.auth')

@section('title')
Next News | Login
@endsection

@section('content')
<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Login in to continue.</h6>
<form class="pt-3" action="{{route('auth.login-proses')}}" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email">
        @error('email')
            <span class="text-danger ">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" id="password"
            placeholder="Password">
        @error('password')
            <span class="text-danger pt-1">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('auth.register')}}" class="text-primary">Create</a>
    </div>
</form>
@endsection

@pushIf($message = Session::get('failed'), 'scripts')
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{$message}}",
        });
    </script>
@endPushIf