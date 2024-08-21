@extends('project_layout')

@section('titile')
    <title>admin_courses</title>
@endsection

@section('content')
    <section class="container mt-3 mr-3">
    <h1 class="container mr-100 ">Courses:-</h1>
    <br>
        @foreach($courses as $course)
            <div class="card">
                <div class="card-body">
                    <h3 style="color: blue;">{{$course->name}}</h3>
                    <p><strong>course_content:- </strong>{{$course->content}}</p>
                    <p><strong>price:- </strong> {{$course->price}}$</p>
                    <p><strong>Duration:- </strong> {{$course->duration}} hours</p>
                    <p><strong>instructor:- </strong> {{$course->instructor_name}}</p>
                    <a class="btn btn-primary" href="/admin/{{$course->id}}/edit_course" role="button">Edit</a>
                    <form  class="d-inline" action="/admin/{{$course->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    
                        
                </div>
            </div>
            <br>
            
        @endforeach
        <p><strong>Add new course</strong></p>
        <a class="btn btn-transparent" href="/admin/create_course" role="button">
                    <i class="fa-solid fa-plus"></i>
                    </a>
    </section>
@endsection
