@extends('layouts.app')

@section('content')
<div class="bg-home-screen">
    <div class="wrapper">
        <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
            <div class="card shadow-none bg-transparent">
                <div class="card-body p-md-5 text-center">
                    <h2 class="text-white">Technology Enables World-Class Customer Experiences.</h2> 
                    <h4 class="text-white">Our technology enables <span class="text-danger">your</span>  world-class experiences.</h4>               
                    <div class="mt-5 mb-5"></div>
                    <a href="{{route('login')}}" class="btn btn-danger m-1 px-5">Login</a>
                    <a href="{{route('register')}}" class="btn btn-danger m-1 px-5">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
