@extends('project_layout')

@section('title')
    <title>Add Course</title>
@endsection

@section('content')
    <section class="container mt-4 mr-3">
        <h2>Add new course</h2>
        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <form method="POST" action="/admin/create_course">
            @csrf 

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="d-block">{{ $message }}</p>
                @enderror
            </div>

            {{-- content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <p class="d-block">{{ $message }}</p>
                @enderror
            </div>

            {{-- price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <p class="d-block">{{ $message }}</p>
                @enderror
            </div>

            {{-- duration --}}
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration') }}">
                @error('duration')
                    <p class="d-block">{{ $message }}</p>
                @enderror
            </div>

            {{-- instructor --}}
            <div class="mb-3">
                <label for="instructor_id" class="form-label">Instructor</label>
                <select class="form-select @error('instructor_id') is-invalid @enderror" name="instructor_id" id="instructor_id" required>
                    @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ old('instructor_id') == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                    @endforeach
                </select>
                @error('instructor_id')
                    <p class="d-block">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Launch</button>
        </form>
    </section>
@endsection
