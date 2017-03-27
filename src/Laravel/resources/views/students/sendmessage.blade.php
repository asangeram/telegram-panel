@extends('vendor.layouts.app')

<?php

use App\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */

$users = $ViewModel->User;

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
                            <form action="/dashboard/users/{{$users->id}}/send" method="POST">
                                {{ csrf_field() }}
            										
                                <h2 class="form-signin-heading">Send Message as Telegram Bot</h2>
                                <label for="inputText" class="sr-only">Message</label>
                                <textarea name="message" type="text" id="inputText" class="form-control" placeholder="Message" required autofocus></textarea>
                                <br />

                            <div>  <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button></div>
                            
                            <br />
                            @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('status') }} status-box">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            </form>
                        </div>              
                    </div>                    
                </div>
            </div>
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
