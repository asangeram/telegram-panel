@extends('vendor.layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><b>Panel Nordala</a>
            </div><!-- /.login-logo -->

        <div class="login-box-body">
        <p class="login-box-msg"> Zaloguj Się aby rozpocząć przygodę  </p>
        <form action="/login" method="POST">
            {{ csrf_field()}}

              @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="example@example.com" name="Email" value="{{ old('Email') }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">        
                <div class="col-xs-3">
                     <input type="submit" value="{{trans('app.LoginBtn')}}" class="btn btn-success pull-left" />
                </div><!-- /.col -->
    

                <div class="col-xs-4">
                    <input type="button" value="{{trans('app.Register')}}" class="btn btn-primary pull-right" onclick="location.href='/register'"/>
                </div>

                <div class="col-xs-5">
                    <input type="button" value="{{trans('auth.forgotpassword')}}" class="btn btn-primary pull-right" onclick="location.href='/password/reset'"/>
                </div>
            </div>
        </form>
    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
  

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
