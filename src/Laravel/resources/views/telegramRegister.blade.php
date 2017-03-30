@extends('vendor.layouts.auth')
<?php

use App\ViewModels\UserEditViewModel;

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
    	<form action="/skipTelegramLogin" method='PATCH'>
    	{{csrf_field()}}
    	<div>
        	<input type="button" class="btn btn-success btn-lg" onclick="window.open('https:/telegram.me/AppBot?start={{$User->token_key}}' , '_blank')" value="Register Your Telegram"/>
        </div>
        <div>
        	<input type="submit" class="btn btn-success btn-lg" value="Skip Telegram Registration"/>
    	</div>
        </form>
	</div>
</body>

@endsection
 