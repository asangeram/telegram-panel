<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if ( Sentinel::check())
            <div class="user-panel">
                <div class="pull-left image">
                    <p>{{ Sentinel::getUser()->name }}</p>
                </div>
                <div class="pull-left info">
                    <p>{{ Sentinel::getUser()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if (Sentinel::check()->isAdmin())
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/telegram/dashboard"><i class='fa fa-home'></i> <span>{{trans('app.Home')}}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user-secret'></i> <span>{{trans('app.TeacherMenu')}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-compass"></i>{{trans('app.Chapter')}}</a></li>
                    <li><a href="/telegram/dashboard/tasks"><i class="fa-map"></i>{{trans('app.Tasks')}}</a></li>
                    <li><a href="/telegram/dashboard/maps"><i class="fa fa-map"></i>{{trans('app.Maps')}}</a></li>
                    <li><a href="#"><i class="fa fa-map-pin"></i>{{trans('app.Pins')}}</a></li>
                    <li><a href="/telegram/dashboard/words"><i class="fa fa-pencil"></i>{{trans('app.Words')}}</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>{{trans('app.UserMenu')}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/telegram/dashboard/users"><i class="fa fa-database"></i>{{trans('app.Users')}}</a></li>
                    <li><a href="/telegram/dashboard/groups"><i class="fa fa-users"></i>{{trans('app.Groups')}}</a></li>
                    <li><a href="/telegram/dashboard/roles"><i class="fa fa-bolt"></i>{{trans('app.Roles')}}</a></li>
                </ul>
                </li>
                @elseif (Sentinel::check()->isTeacher())
                 <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/teacher"><i class='fa fa-home'></i> <span>Home</span></a></li>
                <li class="">
                <a href="#"><i class='fa fa-user-secret'></i> <span>{{trans('app.TeacherMenu')}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                    
                    <li><a href="/telegram/teacher/tasks"><i class="fa fa-tasks"></i>{{trans('app.Tasks')}}</a></li>
                    <li><a href="/telegram/teacher/maps"><i class="fa fa-map"></i>{{trans('app.Maps')}}</a></li>
                    <li><a href="/telegram/teacher/groups"><i class="fa fa-users"></i>{{trans('app.StudentGroups')}}</a></li>
                    <li><a href="/telegram/teacher/words"><i class="fa fa-pencil"></i>{{trans('app.Words')}}</a></li>

                @else (Sentinel::check()->isStudent())
                 <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/telegram/profile/{{$user->id}}/"><i class='fa fa-home'></i> <span>{{trans('app.UserProfile')}}</span></a></li>
                <li class="">
                <a href="#"><i class='fa fa-user-secret'></i> <span>{{trans('app.UserMenu')}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">                    
                    <li><a href="/telegram/profile/{{$user->id}}/edit"><i class="fa fa-users"></i>{{trans('app.EditProfile')}}</a></li>
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
