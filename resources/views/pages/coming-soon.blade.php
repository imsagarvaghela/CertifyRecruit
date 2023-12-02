<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .coming-soon {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="coming-soon">
                    <h1>Coming Soon</h1>
                    <p>We're sorry, but this website is currently under construction.</p>
                    <img src="{{url('storage/images/coming-soon.gif')}}" alt="Under Construction GIF" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</body>
</html>