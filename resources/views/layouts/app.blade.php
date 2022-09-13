<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- {{$newData}} --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 container">
            <div class="row">
                <div class="col-sm-2 p-0">
                    <div class="">
                            <a class="nav-link btn btn-outline-dark text-left {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">Dashboard</a> 
                        
                        @can('user-list')
                            <a class="nav-link btn btn-outline-dark text-left {{ request()->is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a> 
                        @endcan
                        @can('catagory-list')
                            <a class="nav-link btn btn-outline-dark text-left {{ request()->is('catagory-list') ? 'active' : '' }}" href="{{ route('catagory.index') }}">Catagory</a>   
                        @endcan
                        @can('role-list')
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('role-list') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a> 
                        @endcan
                        @can('permission-list')
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('permission-list') ? 'active' : '' }}" href="{{ route('permissions.index') }}">Permission</a>  
                        @endcan
                        
                        @can('post-list')
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('post-list') ? 'active' : '' }}" href="{{ route('post.index') }}">Post</a>   
                        @endcan
                    </div>
                    
                </div>
                <div class="col-sm-10">
                    @if (session('status')) 
                        <div class="alert mx-3 alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div> 
                        @endif
                        @if($errors->any()) 
                          <div class="alert mx-3 alert-danger">
                            {{$errors->first()}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div> 
                        @endif 
                    @yield('content')
                </div>
            </div>
            
            
        </main>
    </div>



</body>
</html>
