@extends('vendor.layouts.app')

<?php

use App\ViewModels\UserEditViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */
$User = $ViewModel->User;


?>

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">      
	    <div class="col-xs-12 ">                  
        <div class="panel panel-default"> 
          <div class="panel-heading">{{trans('app.ProfilHeading')}}</div>                
            <div class="panel-body">                                                                                                         
              <div class="box">
                <h1>{{ $User->name }}</h1>
                <div class="container">
                <h3>{{trans('app.EditProfile')}}</h3>
  	         <hr>
	             <div class="row">
      <!-- left column -->
                  <div class="col-md-3">
                    <div class="text-center">
                      <img src="http://scriptznulled.com/uploads/monthly_2016_09/avatar_female_xl.png.982e54a7aedf3929048b8f660b426907.png"  class="img-circle avatar" alt="avatar">
                      <h6>Upload a different photo...</h6>
                       
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <!-- edit form column -->
                  <div class="col-md-9 personal-info">
                  @if (Sentinel::getUser()->isAdmin())                    
                      <form method="POST" action="/dashboard/users/{{$User->id}}/"> 
                        {{ method_field('PATCH') }}
                        {{ csrf_field()}}
                  @elseif (Sentinel::getUser()->isStudent())
                        <form method="POST" action="/profile/{{$User->id}}/"> 
                        {{ method_field('PATCH') }}
                        {{ csrf_field()}}
                        {{-- <input type='hidden' name='back' onclick="location.href={{$ViewModel->BackUrl}}" /> --}}
                  @endif 
                  
                      
                        
                    <div class="alert alert-info alert-dismissable">
                       
                      <i class="fa fa-coffee"></i>
                      Update Your Profile
                    </div>
                    <h3>Personal info</h3>
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
                        <label class="col-lg-3 control-label">{{trans('app.Nickname')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="Nickname" type="text" value="{{$User->nickname}}" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('app.Name')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="Name" type="text" value="{{$User->name}}"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('app.LastName')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="LastName" type="text" value="{{$User->last_name}}" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">{{trans('app.Email')}}:</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="Email" type="text" value="{{$User->email}}" required>
                          <div><h2>{{ $errors->first('email') }}</h2></div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-md-3 control-label">{{trans('app.Gender')}}:</label> 
                        <div class="dropdown-menu-left col-md-8">                              
                            <select class="form-control" name="Gender">
                            @if ($User->gender === 'male')
                                <li><option selected value="{{$User->gender}}">{{trans('app.male')}}<option></li>
                            @elseif ($User->gender === 'female') 
                              <li><option selected value="{{$User->gender}}">{{trans('app.female')}}<option></li>   
                            @endif
                                <li><option value="Male">{{trans('app.male')}}</option></li>
                                <li><option value="Female">{{trans('app.female')}}</option></li>
                            
                            </select>       
                        </div>
                      </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans('app.TeacherId')}}:</label>
                            <div class="col-md-8">
                              <select name="TeacherId" class="form-control">
                                  <option></option>
                                  @foreach ($ViewModel->Teachers as $teacher)
                                  <option value="{{$teacher->Id}}" {{ ($User->TeacherId === $teacher->Id) ? 'selected':''}}>
                                  {{$teacher->Name}}
                                  @endforeach
                              </select>       
                            </div>
                          </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label">{{trans('app.Password')}}:</label>
                              <div class="col-md-8">
                                <input class="form-control hidden" name="Password" type="password" value="{{$User->password}}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label">{{trans('app.ConfirmPassword')}}:</label>
                              <div class="col-md-8">
                                <input class="form-control hidden" name="Password" type="password" value="{{$User->password}}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label"></label>
                              <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="{{trans('app.Save')}}">
                                 <span></span>
                                @if (Sentinel::getUser()->isAdmin())
                                <input type="reset" class="btn btn-default" value="{{trans('app.CancelBtn')}}" onclick="location.href='/dashboard/users'">
                                @elseif(Sentinel::getUser()->isStudent())
                                <input type="reset" class="btn btn-default" value="{{trans('app.CancelBtn')}}" onclick="location.href='/profile/{{$User->id}}/'">
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

@endsection
