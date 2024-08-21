@extends('project_layout')

@section('title')
    <title>adminlogin</title>
@endsection

@section('content')
    <section class="container">
        <h1>Learnify</h1>
        <h3>The Best Way To Develop Yourself</h3>
        <p>AdminLogin</p>

        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <form action="{{route('adminlogin.post') }}" method="post">
            @csrf

            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" >
                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            {{-- remember me --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="remember">
                <label class="form-check-label" for="flexCheckChecked">
                    remember me
                </label>
            </div>
            <br>
            {{-- button --}}
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </section>
@endsection
