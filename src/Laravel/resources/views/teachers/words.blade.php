@extends('vendor.layouts.app')

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
	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
					<div class="panel-heading">Tasks</div>

					<div class="panel-body">
						<div class="row">
            <div class="col-md-12">
                <form action="/send/group" method="POST">
                    {{ csrf_field() }}
										
                    <h2 class="form-signin-heading">Send Message as Telegram Bot</h2>
                    <label for="inputText" class="sr-only">Message</label>
                    <textarea name="message" type="text" id="inputText" class="form-control" placeholder="Message" required autofocus></textarea>
                    <br>

                    {{-- Radiobuttons --}}
                    <div>
                    <input type="radio" name="messageType" value="inviteLink"> Send Invite Link<br>
                    <input type="radio" name="messageType" value="sendToAll"> Send Private Message to All Group Members<br>
                    <input type="radio" name="messageType" value="sendToGroup"> Send Message To Group
                    </div>

            <div class="row">
                <div class="panel-body">Select Group</div>
                    <div>
                        <select class="form-control" name="group">
                        @foreach($ViewModel->Groups as $groups)
                            <option value="{{$groups->invite_link}}|{{$groups->chat_id}}|{{$groups->group_nr}}" >{{$groups->name}}</option>
                        @endforeach 
                        </select>
                    </div>
                </div>


                  <div>  <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button></div>
                
                <br>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('status') }} status-box">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
				</div>
                </form>
        </div>                    
    </div>
</div>
{{-- <script type="text/javascript">
        function makeTableScroll() {
            // Constant retrieved from server-side via JSP
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
    </script> --}}
@endsection
