<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Imported Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Nunito+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!-- Website style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>COVID-19 Pandemic Evolution</title>
</head>
<body>
<div class="main">
    <header class="container-fluid site-header inner-header">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">COVID-19 Pandemic Evolution</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#wrap1"><span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wrap2">Statistics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wrap2">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wrap2">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')
</div>
</div>
<footer class="container-fluid">
    <div class="row"><span class="copy">@Copyright COVID-19 Pandemic Evolution</span></div>
</footer>
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script type="application/javascript" src="{{ asset('js/script.js') }}"></script>
{{--    <script type="application/javascript" src="{{ asset('js/main.js') }}"></script>--}}
@show
</body>
</html>
