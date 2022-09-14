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
    
    <!-- custome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href=" {{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- summernote -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- custome css -->
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
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a> 
                        @endcan
                        @can('permission-list')
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('permissions') ? 'active' : '' }}" href="{{ route('permissions.index') }}">Permission</a>  
                        @endcan
                        
                        @can('post-list')
                                <a class="nav-link btn btn-outline-dark text-left {{ request()->is('post') ? 'active' : '' }}" href="{{ route('post.index') }}">Post</a>   
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

 <!-- jQuery -->
 <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 
 <!-- AdminLTE App -->
 <script src="{{asset('dist/js/adminlte.js')}}"></script>
 <!-- datatbles plugins -->
 <script src=" {{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
 <script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
 <script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
 <script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
 <script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>
 <script src="{{asset('dist/js/customTable.js')}}"></script>
 <script src="{{asset('dist/js/summerNote.js?v=1.5')}}"></script>
 <script src="{{asset('dist/js/custom.js')}}"></script>



</body>
</html>
