<head>
    <meta charset="UTF-8">
    <title> App - @yield('htmlheader_title', 'Your title here') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript" charset="utf-8" async defer></script>



   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
