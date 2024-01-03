@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Please login or register to use this learning management system
        </div>

        <div class="links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
@endsection
