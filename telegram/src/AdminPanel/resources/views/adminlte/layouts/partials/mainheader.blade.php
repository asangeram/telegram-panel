<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>AP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Nordal</b>Admin Panel </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                    @if (Sentinel::check())
                        <li role="presentation">
                            <form action="/telegram/logout" method="POST" id="logout-form" class="header-btn">
                                {{ csrf_field() }}                           
                                </li>
                                <li><a href="#" onclick="document.getElementById('logout-form').submit()">{{trans('app.Logout')}}</a></li>
                                <li><a href="{{ url('/register') }}">{{ trans('app.Registration') }}</a></li>
                            </form>
                    @endif   
                                    <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
     
            </ul>
        </div>
    </nav>
</header>
