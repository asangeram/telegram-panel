<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>MP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Nordal</b>Maps Panel </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                    @if (Sentinel::check())
                        <li role="presentation">
                            <form action="/logout" method="POST" id="logout-form" class="header-btn">
                                {{ csrf_field() }}                           
                                </li>

                                <li><a href="{{ url('/dashboard') }}">{{ trans('app.Home') }}</a></li>

                                <li><a href="#" onclick="document.getElementById('logout-form').submit()">{{trans('app.Logout')}}</a></li>

                                <li><a href="{{ url('/register') }}">{{ trans('app.Registration') }}</a></li>

                            </form>
                    @endif   
                                    <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-bars"></i></a>
                </li>
     
            </ul>
        </div>
    </nav>
</header>
