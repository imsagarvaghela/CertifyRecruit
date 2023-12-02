@extends('auth.app')

@section('content')
<div class="split left">
<a href="{{route('home.page')}}"><img src="{{ url('storage/images/logo.png') }}" class="top-logo" alt="Top Logo"></a>
    <img src="{{ url('storage/images/register1.png') }}" class="img-fluid" alt="Register Image">
</div>

<div class="split right">
  <div class="centered">
    <form class="p-4 rounded" method="POST" action="{{ route('register') }}">
        @csrf
        <a href="{{route('home.page')}}"><img src="{{ url('storage/images/logo.png') }}" class="logo" alt="Logo"></a>

        <h3 class="text-center mb-4">Register</h3>

        <!-- Name input -->
        <div class="form-group mb-2">
            <label for="name">
                Full Name
                <i class="fa fa-info-circle info-icon" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Please enter your full name that will show in certificate"></i>
            </label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your preferred name for the certificate">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email input -->
        <div class="form-group mb-2">
            <label for="email">Email address</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter a valid email address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <!-- Mobile Number -->
        <div class="form-group mb-2">
            <label for="mobile_number">Mobile Number</label>
            <input type="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter a valid mobile number">
            @error('mobile_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('password', 'eye-icon-password')">
                        <i id="eye-icon-password" class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Confirm Password input -->
        <div class="form-group mb-2">
            <label for="password_confirmation">Confirm Password</label>
            <div class="input-group">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm password">
                <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-password_confirmation')">
                        <i id="eye-icon-password_confirmation" class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>

        <div class="text-center mt-3">
            <p class="text-center mt-4 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-danger text-decoration-none">Login</a></p>
        </div>

    </form>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    function togglePasswordVisibility(inputId, eyeIconId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = document.getElementById(eyeIconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
</script>

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
  overflow-x: hidden;
}

.left {
  left: 0;
  overflow: hidden;
  background: #f8f9fa;
}

.right {
  right: 0;
  overflow: hidden;
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

/* CSS for the tooltip */
.tooltip {
    position: relative;
}

.info-icon {
    cursor: pointer;
    margin-left: 5px;
    font-size: 16px;
    color: #007bff;
}

.tooltip-text {
    display: none;
    position: absolute;
    background-color: #333;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    font-size: 14px;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
}

/* Show the tooltip on hover */
.tooltip:hover .info-icon + .tooltip-text {
    display: block;
}

@media (max-width: 768px) {
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
