<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} | {{ $tittle }}</title>

        <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" >

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset("css/metisMenu.min.css") }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset("css/startmin.css") }}" rel="stylesheet">

        <link href="{{ asset("css/style.css") }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">

            @yield("content-guest")
            
        </div>
        <script src="{{ asset("js/login.js") }}"></script>

        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset("js/metisMenu.min.js") }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset("js/startmin.js") }}"></script>
    </body>
</html>