<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    

               
               
                
<div class="container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="page-content memberLogin">
                            <div class="wizard-v2-content">
                           
                                        <div class="card login-form login-body shadow-lg
                                            rounded-10">
                                            <div class="card-body p-0">
                                                <span class="shape"></span>
                                                <div class="row">
                                                    <div class="col-lg-4 bg-dark">
                                                        <div class="loginSidetext h-100">
                                                            <div class="body">
                                                                <img src="image/logo/logo.png" alt="" class="w-100 p-1 login-page-logo bg-dark">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="loginForm py-5">
                                                            <div class="titleText text-center position-relative">
                                                                <i class="far fa-user-circle"></i>
                                                                <h3></h3>
                                                                <h4 class="mb-4">
                                                                    <big>USER LOGIN</big>
                                                                </h4>
                                                            </div>
                                                            <div class=""></div>
                                                            <form id="quickForm" action="" method="Post"><div class="col-12">
                                                                <div class="form-group">
                                                                        <label for="email" class="form-label-sm font-weight-bold
                                                                            mb-0"> Email </label>
                                                                        <div class="input-group
                                                                            mb-3 loginBox">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <i class="fas fa-envelope"></i>
                                                                            </span>
                                                                            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                                                                        </div>
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email" class="form-label-sm
                                                                            font-weight-bold
                                                                            mb-0"> Password </label>
                                                                        <div class="input-group
                                                                            mb-3 loginBox">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <i class="fas
                                                                                    fa-lock"></i>
                                                                            </span>
                                                                            <input type="password" name="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
                                                                        </div>
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        
                                                                            <label class="form-check-label" for="remember">
                                                                                {{ __('Remember Me') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="flex items-center justify-end mr-4">
                                                                   
                                                                    <div class="float-right">
                                                                      
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-success  float-end px-5">
                                                                                Login
                                                                            </button>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    @if (Route::has('password.request'))
                                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                        {{ __('Forgot Your Password?') }}
                                                                    </a>
                                                                @endif
                                                                </div>
                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                  
                                </div>
                            </div>
                    </form>
                </div>

            </body>
            </html>
            
