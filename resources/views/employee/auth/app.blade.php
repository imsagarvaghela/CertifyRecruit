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
    <div>
        @yield('content')
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
</body>

</html>
