@extends('adminlte::layouts.auth')
<?php

use Nordal\ViewModels\UserEditViewModel;

/**
 * @var $ViewModel UserEditViewModel
 */
$User = $ViewModel->User;


?>
@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div style="text-align: center;">
    	<div>
    		<h1>Register Your Telegram account!</h1>
    	</div>
    	<form action="#" method='PATHC'>
    	{{csrf_field()}}

    	<div>
        	<input type="button" class="btn btn-success btn-lg" onclick="window.open('https:/.me/NordalBot?start={{$User->token_key}}' , '_blank')" value="Register Your Telegram"/>
        	<input type="submit" class="btn btn-success btn-lg" onclick="window.open('https:/.me/NordalBot?start={{$User->token_key}}' , '_blank')" value="Skip Telegram Registration"/>
    	</div>
	</div>
</body>

@endsection
 