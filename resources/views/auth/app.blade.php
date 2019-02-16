<!DOCTYPE html>
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132732435-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-132732435-1');
    </script>
    <!--  -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('title')

    <link rel="shortcut icon" type="image/ico" href="{{ URL::asset('images/favicon.png') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row text-center">
                    <a href="{{ route('home') }}"><h1>Pintaar</h1></a>
                    <p>"Kamu Bisa Belajar Apapun"</p>
                
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