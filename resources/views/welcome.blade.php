@extends('project_layout')

@section('title')
    <title>welcome</title>
@endsection


@section('style')

    <style>
        .welcome-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>

@endsection


@section('content')

    <div class="welcome-container text-center">
        <h1>Welcome to Learnify!</h1>
        <br>
        <h4>The Best Way to Develop Yourself </h4>
        <div class="mt-4">
            <a class="btn btn-primary" href="{{route('register')}}" role="button">Register</a>      
            <a class="btn btn-secondary mr-2" href="{{('login')}}" role="button">Login</a>
            <a class="btn btn-success" href="{{route('adminlogin')}}" role="button">LoginAsAdmin</a>
        </div>
    </div>

@endsection
