<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Users & Patiensts Login - EU MediCare</title>
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
                                <h4 class="text-uppercase font-bold m-t-5">{{ __('user & patient login') }}</h4>
                            </div>
                            <div class="account-content">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group m-b-20 row">
                                        {{-- <div class="col-12">
                                            <label for="emailaddress">{{ __('Email address') }}</label>
                                            <input type="email" id="emailaddress"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="User Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                        <div class="col-12">
                                            <label for="institute_id">{{ __('Academic ID') }}</label>
                                            <input type="text" id="emailaddress"  class="form-control @error('institute_id') is-invalid @enderror" name="institute_id" value="{{ old('institute_id') }}" required autocomplete="institute_id" autofocus placeholder="User Academic ID">
                                            @error('institute_id')
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
<div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Don't Registered? <a href="{{route('register')}}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                    </div>
                                </div>

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
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
