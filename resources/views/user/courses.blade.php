@extends('project_layout')

@section('title')
    <title>courses</title>
@endsection

@section('content')
    <section class="container mt-3 mr-3">
        <h1 class="container mr-100 ">Courses:-</h1>
        <br>
        @foreach ($courses as $course)
            <div class="card">
                <div class="card-body">
                    <h3 style="color: blue;">{{ $course->name }}</h3>
                    <p><strong>course_content:- </strong>{{ $course->content }}</p>
                    <p><strong>price:- </strong> {{ $course->price }}$</p>
                    <p><strong>Duration:- </strong> {{ $course->duration }} hours</p>
                    <p><strong>instructor:- </strong> {{ $course->instructor_name }}</p>
                    <form action="/checkout" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <button class="btn btn-primary">Buy Course Now</button>
                    </form>

                </div>
            </div>
            <br>
        @endforeach
    </section>
@endsection
