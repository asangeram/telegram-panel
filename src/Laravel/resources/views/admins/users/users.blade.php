@extends('adminlte::layouts.app')   

<?php

use Nordal\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$users = $ViewModel->Users;

?>

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">      
	<div class="col-xs-12 s">                  
            <div class="panel panel-default"> 
                <div class="panel-heading">Users</div>                
                    <div class="panel-body">
                        List of all students.                                                                                                          
                    <div class="box">
                            <br>
                           <div><input type="text" id="myInput" onkeyup="search()" placeholder="Search for names.."></div>
                            <br>
                            <table class="table table-responsive table-bordered table-hover" id="table" cellspacing="0" width="100%"> 
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nickname</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Gender</th>                                                                       
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="item{{$user->id}}">
                                <td>{{$user->id}}</td>
                                <td>{{$user->nickname}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->gender}}</td>
                                <td>
  
                                    <input type="button" class="btn btn-info" onclick="location.href='/dashboard/users/{{$user->id}}/edit'" value="{{trans('app.EditBtn')}}" />
                          
                                    <input type="button" class="btn btn-danger" onclick="deleteUser(this, {{$user->id}});return false;" value="{{trans('app.DeleteBtn')}}" />
                                    @if($user->chat_id != NULL )
                                    <input type="button" class="btn btn-success" onclick="location.href='/dashboard/users/{{$user->id}}/message'" value="{{trans('app.SendTelegramMessage')}}" />
                                    @endif
                                    <script type="text/javascript">
                                        function deleteUser(link, userId){
                                            console.log(link);
                                            if (confirm('Usunac?')){
                                                $.ajax({
                                                    url: '/dashboard/users/'+userId+'/delete',
                                                    success:function(){
                                                        $(link).closest('tr').slideDown(500, function(){ $(this).remove(); });

                                                    }
                                                });
                                            }
                                        }
                                    </script>
                               
                                </td>
                            </tr>
                            @endforeach                       
                        </tbody>
                    </table>
                
	</div>
    </div>
</div>

@endsection
