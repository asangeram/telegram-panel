
<?php

use Nordal\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel DashboardViewModel
 * 
 */

$user = $ViewModel->User;

?>
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
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
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
            <li class="active"><a href="/dashboard"><i class='fa fa-home'></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user-secret'></i> <span>Teacher Menu</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-compass"></i>Chapter</a></li>
                    <li><a href="/dashboard/tasks"><i class="fa-map"></i>Task</a></li>
                    <li><a href="/dashboard/maps"><i class="fa fa-map"></i>Map</a></li>
                    <li><a href="#"><i class="fa fa-map-pin"></i>Pin</a></li>
                    <li><a href="#"><i class="fa fa-pencil"></i>Words</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>User Menu</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard/users"><i class="fa fa-database"></i>Users</a></li>
                    <li><a href="/dashboard/groups"><i class="fa fa-users"></i>Groups</a></li>
                    <li><a href="/dashboard/roles"><i class="fa fa-bolt"></i>Roles</a></li>
                </ul>
                </li>
                @elseif (Sentinel::check()->isTeacher())
                 <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/teacher"><i class='fa fa-home'></i> <span>Home</span></a></li>
                <li class="">
                <a href="#"><i class='fa fa-user-secret'></i> <span>Teacher Menu</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                    
                    <li><a href="/teacher/tasks"><i class="fa fa-tasks"></i>Task</a></li>
                    <li><a href="/teacher/maps"><i class="fa fa-map"></i>Map</a></li>
                    <li><a href="/teacher/groups"><i class="fa fa-users"></i>Student Groups</a></li>

                @else (Sentinel::check()->isStudent())
                 <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/profile/{{$user->id}}/"><i class='fa fa-home'></i> <span>Student Profile</span></a></li>
                <li class="">
                <a href="#"><i class='fa fa-user-secret'></i> <span>Student Menu</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">                    
                    <li><a href="/profile/{{$user->id}}/edit"><i class="fa fa-users"></i>Edit Profile</a></li>
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
