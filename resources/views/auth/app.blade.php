<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('title')

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row text-center">
                    <a href="{{ route('home') }}"><h1>Pintaar</h1></a>
                    <p>"Kamu bisa belajar apapun"</p>
                
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>