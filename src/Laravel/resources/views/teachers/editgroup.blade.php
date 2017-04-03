@extends('vendor.layouts.app')
<?php

use Nordal\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$groups = $ViewModel->Group;

?>
@section('main-content')
	<div class="container-fluid spark-screen">
    <div class="row">      
	    <div class="col-xs-12 ">                  
        <div class="panel panel-default"> 
          <div class="panel-heading">{{trans('telegram_trans::app.ProfilHeading')}}</div>                
            <div class="panel-body">                                                                                                         
              <div class="box">
                <h1>{{ $groups->name }}</h1>
                <div class="container">
                <h3>{{trans('telegram_trans::app.EditProfile')}}</h3>
  	         <hr>
	             <div class="row">
                  <div class="col-md-9 personal-info">
                  @if (Sentinel::getUser()->isAdmin())                    
                      <form method="POST" action="/dashboard/groups/{{$groups->id}}/"> 
                        {{ method_field('PATCH') }}
                        {{ csrf_field()}}
                  @endif 
                  
                      
                        
                    <div class="alert alert-info alert-dismissable">
                       
                      <i class="fa fa-coffee"></i>
                      Update Your Group Info
                    </div>
                    <h3>Group info</h3>
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    
                    <form class="form-horizontal" role="form" style="overflow-x: auto">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('telegram_trans::app.Nazwa Grupy')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="Name" type="text" value="{{$groups->name}}" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('telegram_trans::app.Slug Grupy')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="GroupSlug" type="text" value="{{$groups->group_slug}}"  required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('telegram_trans::app.Numer Grupy')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="GroupNr" type="text" value="{{$groups->group_nr}}" readonly="readonly" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('telegram_trans::app.Invite Link')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="InviteLink" type="text" value="{{$groups->invite_link}}" readonly="readonly" required>
                          <div><h2>{{ $errors->first('email') }}</h2></div>
                        </div>
                      </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label"></label>
                              <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="{{trans('telegram_trans::app.Save')}}">
                                 <span></span>
                                @if (Sentinel::getUser()->isAdmin())
                                <input type="reset" class="btn btn-default" value="{{trans('telegram_trans::app.CancelBtn')}}" onclick="location.href='/dashboard/groups'">
                                @elseif(Sentinel::getUser()->isStudent())
                                <input type="reset" class="btn btn-default" value="{{trans('telegram_trans::app.CancelBtn')}}" onclick="location.href='/profile/{{$User->id}}/'">
                                @endif
                              </div>
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
              <hr>
            </div>          
          </div>
	    </div>
    </div>
</div>



  <script>
  
  </script>
@endsection
