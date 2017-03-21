@extends('adminlte::layouts.app')

<?php

use Nordal\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$user = $ViewModel->User;

?>
@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <form method="POST" action="/telegram/dashboard/addtogroup">
            {{csrf_field() }}

					<div class="panel-heading">Add Users To Group</div>

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

                    <div>
                        <label>Users:</label>
                       
                        <table id="myTable" class="table-bordered table-responsive table-striped" style="border-collapse: collapse;">
                            @foreach($user as $id)
                            <tr>
                                <td><input type="checkbox" name="user_id[]" value="{{$id->id}}">{{$id->name}}<span></span>{{$id->last_name}}</td>
                            </tr>
                            @endforeach

                        </table>
                        <input type="submit" name="submit" value="Submit" class="btn btn-toolbar">    
             {{--    <ul>
                    <li><input type="checkbox">{{$id->chat_id}}</li>     
                </ul> --}}
        
                    </div>
                </div>
            </form>
		</div>
	</div>
    </div>
                            
</div>

<script type="text/javascript">
        function makeTableScroll() {
   
            var maxRows = 4;

            var table = document.getElementById('myTable');
            var wrapper = table.parentNode;
            var rowsInTable = table.rows.length;
            var height = 0;
            if (rowsInTable > maxRows) {
                for (var i = 0; i < maxRows; i++) {
                    height += table.rows[i].clientHeight;
                }
                wrapper.style.height = height + "px";
            }
        }
    </script>
@endsection
