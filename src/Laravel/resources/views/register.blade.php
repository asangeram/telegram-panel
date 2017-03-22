@extends('vendor.layouts.auth')

@section('htmlheader_title')
    
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
        <form action="/register" method="POST">
            {{ csrf_field()}}
        
            <div class="register-box">
         
                <h2 class="box-header">Nordal Register</h2>

                    {{-- <div class="register-box"> --}}

                <div class="register-box-body">
                    @if(count($errors))
                        <div class="form-group has-feedback">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                         <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{trans('app.Nickname')}}" name="Nickname" value="{{ old('Nickname') }}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{trans('app.Name')}}" name="Name" value="{{ old('Name') }}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                         <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{trans('app.LastName')}}" name="LastName" value="{{ old('LastName') }}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="{{trans('app.Email')}}" name="Email" value="{{ old('Email') }}"/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="dropdown-menu-left form-group">
                            <select class="form-control" name="Gender">
                                <li><option value="Male">{{trans('app.male')}}</option></li>
                                <li><option value="Female">{{trans('app.female')}}</option></li>
                            </select>   
                        </div>
{{--                         <div class="form-group has-feedback">
                            <input type="tel" class="form-control" placeholder="{{trans('app.Telephone')}}" name="PhoneNumber" 
                                title="Phone Number (Format: +99(99)999-999-999)"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div> --}}
                        <div class="form-group has-feedback"> 
                            <input type="password" class="form-control" placeholder="{{trans('app.Password')}}" name="password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{trans('app.ConfirmPassword')}}" name="password_confirmation"/>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
									
                        <div class="form-group has-feedback">
                            <input type="hidden" name="TokenKey" value="{{$uniqueToken}}">
                        </div>
												
                        <div class="row">        
                            <div class="col-xs-3">
                                <input type="submit" value="{{trans('app.Register')}}" class="btn btn-success pull-left" />
                            </div>
                            <div class="col-xs-9">
                                <input type="button" value="{{trans('app.Login')}}" class="btn btn-primary pull-right" onclick="location.href='/login'"/>
                            </div>     
                    </div>
                    </div>
                {{-- </div>< --}} 
        </form>
    </div>
</body>

@endsection
