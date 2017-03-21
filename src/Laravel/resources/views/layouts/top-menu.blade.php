<div class="clearfix header">
    <nav>
        <ul class="nav nav-pills pull-right">
            @if(Sentinel::check())
            <li role="presentation">
                <form action="/logout" method="POST" id="logout-form" class="header-btn">
                    {{ csrf_field() }}

                    <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                </form>
            </li>
            @else
                <li role="presentation" class="header-btn"><a href="/" class="">Home</a></li>
                <li role="presentation" class="header-btn"><a href="/login" class="">Login</a></li>
                <li role="presentation" class="header-btn"><a href="/register" class="">Register</a></li>
            @endif
        </ul>
        <h3 class="text-muted text">
            @if(Sentinel::check())
                Hello, {{ Sentinel::getUser()->name }}
            @else
                Nordal
            @endif
        </h3>
    </nav>
</div>

