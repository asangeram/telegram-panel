@extends('adminlte::layouts.app')
<?php

use Nordal\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$users = $ViewModel->User;

?>
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">						 
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default panel-collapse">
					<div class="panel-heading accordion"><h2>Create New Group</h2></div>
						@if(count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>                  
                    @endif	


		
			<div class="register-box">
				<form action="/telegram/dashboard/groups" method="POST">
					{{ csrf_field()}}
		
				<div class="form-group has-feedback">
	                <input type="text" class="form-control" placeholder="Group Name" name="Name" value="{{ old('name') }}"/>
	             	<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
                  
				<div class="row">        
                    <div class="col-xs-3">
                        <input type="submit" value="{{trans('app.Create')}}" class="btn btn-success pull-left" />
                    </div>    
                </div>
				</form>
			</div>
		</div>

		<div>
			
			
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">

				<div class="panel-heading"><h2>List of Groups</h2></div>
                    <br>
                   <div><input type="text" id="search" onkeyup="searchGroups()" placeholder="Search for names.."></div>
                    <br>
                    <table class="table table-responsive table-bordered table-hover" id="table" cellspacing="0" width="100%"> 
                    <thead>
                        <tr>                                  
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Group Nr</th>
                                                          
                        </tr>
                    </thead>
                		<tbody>
		                    @foreach($ViewModel->Group as $groups)
		                    <tr class="item{{$groups->id}}">
		                        <td>{{$groups->id}}</td>
		                        <td>{{$groups->name}}</td>
		                        <td>{{$groups->group_slug}}</td>
		                        <td>{{$groups->group_nr}}</td>

		                        <td>

		                            <input type="button" class="btn btn-info" onclick="location.href='/telegram/dashboard/groups/{{$groups->id}}/edit'" value="{{trans('app.EditBtn')}}" />
		                  
		                            <input type="button" class="btn btn-danger" onclick="deleteGroup(this, {{$groups->id}});return false;" value="{{trans('app.DeleteBtn')}}" />
		                            @if($groups->chat_id != NULL )
		                            <input type="button" class="btn btn-success" onclick="location.href='/telegram/dashboard/words'" value="{{trans('app.SendTelegramMessage')}}" />
		                            @endif

		                            <script type="text/javascript">
		                                function deleteGroup(link, groupId){
		                                    console.log(link);
		                                    if (confirm('Usunac?')){
		                                        $.ajax({
		                                            url: '/dashboard/users/'+groupId+'/delete',
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
		<div class="row">						 
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><h2>Add Users To Group</h2></div>

					<form action="/telegram/dashboard/groups/addtogroup" method="POST">
						{{ csrf_field()}}
					
					<div class="panel-body">
						<div class="row">
			            	<div class="panel-body">Select Group</div>
			                    <div>
				                    <select class="form-control" name="group_nr">
				                    @foreach($ViewModel->Group as $groups)
				                        <option value="{{$groups->group_nr}}" >{{$groups->name}}</option>
				                    @endforeach 
				                    </select>
			                    </div>
			            </div>
		            </div>
			            <hr>
	
			        <div class="box">        
			            <div><input type="text" id="studentsGroup" onkeyup="usersInGroup()" placeholder="Search for names.."></div>
			            <br>
		                    <div style="overflow: scroll; height: 350px;"><table class="table table-responsive table-bordered table-hover" id="tableStudents" cellspacing="0" width="100%"> 
		                    <thead>
		                    	<tr>
		                    		<th class="text-center">Id</th>
		                    		<th class="text-center">Name</th>
		                    		<th class="text-center">Last Name</th>
		                    		<th class="text-center">Current Group</th>
		                    	</tr>
		                    </thead>
		                    <tbody>
		                        @foreach($users as $user)
		                        <tr class="item{{$user->id}}">
		                            <td><input type="checkbox" name="user_id[]" value="{{$user->id}}"></td>
		                            <td>{{$user->name}}</td>
		                            <td>{{$user->last_name}}</td>
		                            <td>{{$user->group_nr}}</td>
		                        </tr>
		                        @endforeach
							</tbody>
		                    </table></div>
		                    <input type="submit" name="submit" value="Submit" class="btn btn-toolbar"/> 
			        
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
        </div>
		</div>
	</div>
</div>


  <script>

  </script>
@endsection
