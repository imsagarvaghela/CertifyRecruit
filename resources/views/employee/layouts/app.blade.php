<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CertifyRecruit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('storage/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('storage/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(to right, #97c7ac, #efdb92); 
        }
    
        .container-fluid {
            display: flex;
            height: 100vh;
        }
    
        .sidebarContent {
            flex: 0 0 300px;
            background-color: #000;
            color: #fff;
            border-radius: 20px;
            overflow: hidden;
            padding-bottom: 50px;
        }
    
        .logo-container {
            text-align: center;
            margin: 20px 0;
        }
    
        .logo-container img {
            max-width: 80%;
            border-radius: 50%;
        }
    
        .line {
            border-top: 1px solid #555;
            margin: 20px 0;
        }
    
        .options-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    
        .options-list li {
            margin-bottom: 10px;
        }
    
        .options-list a {
            text-decoration: none;
            color: #fff;
        }
    
        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
    
        .main-content {
            flex: 1;
            padding: 20px;
            color: #000;
            min-height: 100vh;
        }
    </style>     --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(to right, #97c7ac, #efdb92);
        }

        .sidebarContent {
            height: 100vh;
            color: #fff;
            border-radius: 20px;
            overflow: hidden;
            max-width:300px !important;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            max-width: 100%;
            border-radius: 50%;
        }

        .line {
            border-top: 1px solid #555;
            margin: 20px 0;
        }

        .options-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .options-list li {
            margin-bottom: 10px;
        }

        .options-list a {
            text-decoration: none;
            color: #fff;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
        
        .main-content {
            padding: 20px;
            color: #000;
            min-height: 100vh;
        }
    </style>
    <style>
        .sidebar {
            height: 100vh;
            background-color: #000; /* Black background color */
            color: #fff; /* Text color */
            border-radius: 20px; /* Rounded border */
            overflow: hidden;
            margin: 2px;
            padding: 10px;
            margin-left: 9px;
        }

        .sidebar-content {
            padding: 10px 0px 10px 0px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            max-width: 100%;
            border-radius: 50%;
        }

        .line {
            border-top: 1px solid #555; /* Horizontal line color */
            margin: 20px 0;
        }

        .options-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .options-list li {
            margin-bottom: 10px;
        }

        .options-list a {
            text-decoration: none;
            color: #fff; /* Link color */
        }

        .logout {
            position: absolute;
            bottom: 20px;
            /* width: 100%; */
        }
        .logoutButton{
            background: #c10303;
            padding: 8px 8% 8px 9%;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    @yield('css')
</head>

<body class="antialiased">

    <div class="container-fluid">
        <div class="row" style="display:flex;">
            <!-- Sidebar -->
            <div class="col-md-3 sidebarContent">
                <div class="sidebar-content">
                    @include('employee.layouts.sidebar')
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 main-content">
                @yield('content') <!-- This is where the content from child views will be inserted -->
            </div>
        </div>
    </div>


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
@yield('script')
</body>
</html>