<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url("backend/assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <link href="{{ url("backend/assets/vendor/fonts/circular-std/style.css")}}"  rel="stylesheet">
    <link rel="stylesheet" href="{{ url("backend/assets/libs/css/style.css")}}">
    <link rel="stylesheet" href="{{ url("backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 41px;
    }
    </style>
</head>

<body>

    
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            @yield('section')
        </div>
    </div>
    
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ url("backend/assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
    <script src="{{ url("backend/assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
</body>
 
</html>