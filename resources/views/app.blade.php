<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Albert Biszta') }}</title>

    <!-- Scripts -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="css/bootstrap-table-expandable.css" rel="stylesheet">




</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav mr-auto">
                    <ul class="nav nav-tabs ">


                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('posts') }}"> <b> Posty </b></a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('users/ranking')}}"> <b> Najaktywniejsi użytkownicy  </b></a>
                        </li>



                    </ul>
                </ul>




            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<!-- Footer -->

<footer class="app-footer">


    <!-- Footer Elements -->


    <!-- Copyright -->
    <div class="text-muted">

        <div class="footer-copyright text-center py-3" id="copyright-text"> © Albert Biszta  ©

        </div>

        <!-- Copyright -->
    </div>
</footer>
<!-- Footer -->


<script src="{{asset('js/app.js')}}"></script>

<script src="js/bootstrap-table-expandable.js"></script>


</body>
</html>