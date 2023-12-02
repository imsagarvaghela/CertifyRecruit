<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CertifyRecruit</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        /* Loader */
        .loading-spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white overlay */
            z-index: 9999; /* Place the loader above everything */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <!-- Add the favicon link tag here -->
    {{-- <link rel="icon" href="{{ asset('storage/images/logo2.jpg') }}"> --}}

</head>

<body class="antialiased">
    <div id="loading-spinner" class="loading-spinner">
        <div class="loader"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login-form">
                <!-- Right side with login form -->
                <form class="p-4 rounded" method="POST" action="{{ route('employee.login') }}">
                    @csrf
                    <h1 style="text-align:center;">SIGN IN</h1>
                    <p style="text-align:center;">Where Every Login Feels Like Coming Home.</p>

                    <!-- Email input -->
                    <div class="form-group mb-3">
                        <label for="login">Email or User Id</label>
                        <input type="text" id="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" placeholder="Email/User Id " autofocus required>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
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

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger btn-block">SIGN IN</button>
                    </div>

                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6 gradient-background">
                <div>
                    <h1 style="text-align:center;color: white;">HELLO WELCOME !</h1>
                    <p style="text-align:center; font-weight: 600;color: white;">Your Journey Begins with a Simple Registration</p>
                    <div><a href="{{ route('employee.register') }}" class="signupButton" style="margin-left:80px;">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS link here (at the end of the body) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 10000,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            toastClass: 'toast-light'
        };
    </script>
    @if(session('success'))
        <script>
            toastr.options.timeOut = 10000;
            toastr.success("{{ session('success') }}", 'Success');
        </script>
    @endif

    @if(session('error'))
        <script>
            toastr.options.timeOut = 10000;
            toastr.error("{{ session('error') }}", 'Error');
        </script>
    @endif
    <script>
        // Function to hide the loader
        function hideLoader() {
            document.getElementById('loading-spinner').style.display = 'none';
        }

        // Attach the hideLoader function to the window's load event
        window.onload = hideLoader;
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
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .gradient-background {
            height: 100vh;
            background: linear-gradient(to bottom right, orange, green);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            width: 300px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #c9c9c9;
        }

        .signinButton {
            width: 100%; /* Set the width to 100% */
            padding: 10px;
            background: red;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .signupButton {
            width: 52%;
            cursor: pointer;
            border-radius: 50px;
            background: content-box;
            text-decoration: none !important;
            color: #fff !important;
            font-size: 16px;
            line-height: 22px;
            padding: 10px 20px;
            border: none;
            border: 2px solid;
            display: flex;
            justify-content: center;
        }
    </style>
</body>
</html>