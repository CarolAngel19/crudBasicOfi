<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud Basic</title>

        <link rel="stylesheet" href="{{ asset('css\app.css') }}">

    </head>

    <body class="container">
        <div class="container shadow" style="width:100%; background-color: rgb(148, 245, 221);">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Crud Basic</h1>
                </div>
            </div>
        </div>
        
        <div id="app">
            @include('components.templates.nav')

            @php(!isset($type) ? $type = 'home' : '')


            @if($type == 'login')
                <x-auth.auth></x-auth.auth>
            @elseif($type == 'register')
                <x-auth.register></x-auth.register>
            @endif


            @yield('content')

            

            
        </div>

        <script src="{{ mix('js/app.js') }}"></script>


    </body>
</html>