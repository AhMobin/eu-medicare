<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Doctor Login - EU MediCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/template/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('public/template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/template/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/template/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/template/css/account.css')}}" rel="stylesheet" type="text/css">

</head>


<body class="bg-accpunt-pages"> 
    {{-- we can use background image --}}

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="account-pages">
                            <div class="account-box">
                                <a href="{{ url('/') }}"><img src="{{ asset('public/template/images/BannerX.jpg')  }}" alt="" height="100" width="100%"></a>
                            <div class="account-logo-box">
                                <h4 class="text-uppercase font-bold m-t-5">{{ __('doctor login') }}</h4>
                            </div>
                                <div class="account-content">
                                    <form method="POST" action="{{ route('doctor.login.submit') }}">
                                        @csrf
                                        <div class="form-group m-b-20 row">
                                            <div class="col-12">
                                                <label for="emailaddress">{{ __('Email address') }}</label>
                                                <input type="email" id="emailaddress"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="User Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <a href="{{ route('password.request') }}" class="text-muted pull-right"><small>{{ __('Forgot your password?') }}</small></a>
                                                <label for="password">{{ __('Password') }}</label>
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="User Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
</body>
</html>


{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Doctor Login') }}</div>

                    <div class="card-body">

                        <form id="" method="POST" action="{{ route('doctor.login.submit') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div>
                                <div class="">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberme" class="filled-in chk-col-pink">
                                    <label for="rememberme">Remember Me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
