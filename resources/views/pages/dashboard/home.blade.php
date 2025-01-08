@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">Selamat datang</h3>
        <p>{{auth()->user()->name}}</p>
    </div>
</div>

@endsection
