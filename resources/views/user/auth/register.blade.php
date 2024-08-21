@extends('project_layout')

@section('title')
    <title>Register</title>
@endsection


@section('content')
    <section class="container">
        <h1>Learnify</h1>
        <h3>The Best Way To Develop Yourself</h3>
        <p>create an account</p>

        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <form action="/register" method="post">
            @csrf
            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>


            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" id="email"
                    class="form-control  @error('email')is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>


            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" id="password"
                    class="form-control  @error('password')is-invalid @enderror" value="{{ old('password') }}">
                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror

                <p>password must contain
                    At least one lowercase letter.
                    At least one uppercase letter.
                    At least one digit.
                    At least one special character (from the set @$!%*?&).
                    Minimum length of 8 characters.</p>
            </div>


            {{-- buttton --}}
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
            </div>
            <a href="/login">already have an account</a>

        </form>
    </section>
@endsection
