<!DOCTYPE html>
<html lang="en">
    <head>


    <title>Nordal</title>
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/style.css') }}">
        <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    
    
    </head>

    <body>

        <div class="container">
            @include('layouts.top-menu')


        @yield('content')
       

        </div>
    
    </body>
</html>
