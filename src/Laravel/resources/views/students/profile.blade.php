@extends('vendor.layouts.app')

<?php

use Nordal\ViewModels\UserEditViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$user = $ViewModel->User;

?>
@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Welcome</div>                 	
					
					
                  	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$user->name}} {{$user->last_name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="Use Pic" src="http://scriptznulled.com/uploads/monthly_2016_09/avatar_female_xl.png.982e54a7aedf3929048b8f660b426907.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                   
                      <tr>
                        <td>Nickname:</td>
                        <td>{{$user->nickname}}</td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td>{{$user->name}}</td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td>{{$user->last_name}}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Email:</td>
                        <td>{{$user->email}}</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>{{$user->gender}}</td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>{{$user->phone_number}}</td>
                      </tr>
                      <tr>
                        <td>Teacher Id</td>
                        <td>{{$user->teacher_id}}</td>
                      </tr>
                        <td>Current Map:</td>
                        <td>{{$user->map_id}}</td>
                           
                      </tr>
                   
                    </tbody>
                  </table>
                  <input type="button" class="btn btn-primary" onclick="location.href='/profile/{{$user->id}}/edit'" value="edit"/>
                </div>
              </div>
            </div>
                  

					</div>
				</div>
			</div>
		</div>
@endsection
