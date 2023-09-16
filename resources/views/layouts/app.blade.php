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

        <!-- Timeline CSS -->
        <link href="{{ asset("css/timeline.css") }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset("css/startmin.css") }}" rel="stylesheet">

        <link href="{{ asset("css/style.css") }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset("css/morris.css") }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <main>
            <div id="wrapper">
                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    @include('layouts.top-navbar')
                    @include('layouts.left-navbar')
                </nav>
                {{-- Content --}}
                <div id="page-wrapper">
                    @yield("content-app")
                </div>
            </div>
        </main>
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("js/fonction.js") }}"></script>
        <script src="{{ asset("js/ajax.js") }}"></script>
        <script src="{{ asset("js/startmin.js") }}"></script>
        <script src="{{ asset("js/metisMenu.min.js") }}"></script>
        <script src="{{ asset("js/raphael.min.js") }}"></script>
        <script src="{{ asset("js/morris.min.js") }}"></script>
        <script src="{{ asset("js/morris-data.js") }}"></script>
    </body>
</html>
