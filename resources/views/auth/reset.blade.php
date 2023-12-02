@extends('auth.app')

@section('content')
<div class="split left">
    <a href="{{route('home.page')}}"><img src="{{ url('storage/images/logo.png') }}" class="top-logo" alt="Top Logo"></a>
    <img src="{{ url('storage/images/register1.png') }}" class="img-fluid" alt="Register Image">
</div>

<div class="split right">
    <div class="centered">
        <form class="p-4 rounded" method="POST" action="{{ route('password.email') }}">
            @csrf
            <a href="{{ route('home.page') }}"><img src="{{ url('storage/images/logo.png') }}" class="logo" alt="Logo"></a>

            <h3 class="text-center mb-4">Forgot Password</h3>

            <!-- Email input for password reset -->
            <div class="form-group mb-4">
                <label for="email">Email address</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-muted">Back to Login</a>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        font-family: Arial;
    }

    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
    }

    .left {
        left: 0;
        background: #f8f9fa;
    }

    .right {
        right: 0;
        background: #f8f9fa;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .centered form {
        width: 350px;
        border-radius: 50%;
        box-shadow: -10px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .logo{
        display: none
    }

    .top-logo{
        max-width: 200px; /* Increase the logo size */
        margin: -50px auto; /* Center the logo horizontally and vertically */
        display: block; /* Display the logo for tablet and larger screens */
        z-index: 1000;
        position: absolute;
    }

    @media (max-width: 768px) { /* For tablet and smaller screens */
        .split {
            width: 100%;
            position: relative;
            height: auto;
        }

        .left, .right {
            width: 100%;
            position: relative;
            background: #f8f9fa;
        }

        .centered {
            position: relative;
            top: auto;
            left: auto;
            transform: none;
            text-align: center; /* Center the form content horizontally */
            padding: 20px; /* Add padding for spacing */
        }

        .centered form {
            margin-top: 50px;
            width: 100%;
        }

        /* Hide the image for screens smaller than 768px */
        .split.left img {
            display: none;
        }

        body {
            background: #f8f9fa;
        }

        .logo {
            max-width: 200px; /* Increase the logo size */
            margin: 0 auto; /* Center the logo horizontally and vertically */
            display: block; /* Display the logo for tablet and larger screens */
        }

        .top-logo{
            display: block;
        }
    }

</style>
@endsection