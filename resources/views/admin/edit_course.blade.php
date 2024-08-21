@extends('project_layout')

@section('title')
    <title>edit_course</title>
@endsection

@section('content')
    <section class="container mt-3 mr-3">
        <h1>Edit Course Details</h1>
        <form action="/admin/{{ $course->id }}" method="POST">
            @method('PUT')
            @csrf
            {{-- name --}}
            <div class="mt-3">
                <label for="" class="form-lable"><strong>CourseName</strong></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}">
            </div>

            {{-- content --}}
            <div class="mt-3">
                <label for="" class="form-lable"><strong>Content</strong></label>
                <input type="text" name="content" id="content" class="form-control" value="{{ $course->content }}">
            </div>

            {{-- price --}}
            <div class="mt-3">
                <label for="" class="form-lable"><strong>Price</strong></label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}">
            </div>

            {{-- duration --}}
            <div class="mt-3">
                <label for="" class="form-lable"><strong>Duration</strong></label>
                <input type="number" name="duration" id="duration" class="form-control" value="{{ $course->duration }}">
            </div>

            {{-- instructor --}}
            <div class="mt-3">
                <label for="" class="form-lable"><strong>Instructor</strong></label>
                <input type="text" name="instructor_id" id="instructor_id" class="form-control"
                    value="{{ $course->instructor_id }}">
            </div>

            <button class="mt-3 btn btn-primary">Edit</button>
        </form>
    </section>
@endsection
