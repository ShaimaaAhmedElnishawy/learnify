@extends('project_layout')

@section('title')
    <title>profile</title>
@endsection

@section('content')
    <section class="container mt-3 mr-3">
    <h1 class="container mr-100 "> Your Courses:-</h1>
    <br>
        @foreach($courses as $course)
            <div class="card">
                <div class="card-body">
                    <h3 style="color: blue;">{{$course->name}}</h3>
                    <p><strong>course_content:- </strong>{{$course->content}}</p>
                    <p><strong>price:- </strong> {{$course->price}}$</p>
                    <p><strong>Duration:- </strong> {{$course->duration}} hours</p>
                    <p><strong>instructor:- </strong> {{$course->instructor_name}}</p>
                    <a class="btn btn-primary" href="" role="button">continue learing</a>
                        
                </div>
            </div>
            <br>
            
        @endforeach

        <a class="btn btn-primary" href="/courses" role="button">explore courses</a>
    </section>
@endsection
