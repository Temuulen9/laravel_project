<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Номуунбаялаг</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('styles')
</head>
@livewireStyles
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            @yield('more')
        
            @guest
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img src="/svg/logo.svg" alt="" style="height: 60px;" class="pr-3"></div>
                    <div class="pt-3">Номуунбаялаг</div>
                </a>
            @else
                <a class="navbar-brand d-flex" href="{{ url('/home') }}">
                    <div><img src="/svg/logo.svg" alt="" style="height: 60px;" class="pr-3"></div>
                    <div class="pt-3">Номуунбаялаг</div>
                </a>
            @endguest
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Бүртгүүлэх') }}</a>
                            </li>
                        @endif
                    @else
                  
                        
                        @can('hasToken')
                        
                        <a href="{{ route('durem')  }}" class="nav-link">Дүрэм</a>
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               Дүрмийн тест
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item" href="{{ route('test.sub.index') }}">
                                        Сэдэвчилсэн тест
                                    </a>
                                    <a class="dropdown-item" href="{{ route('test.exam.index') }}">
                                        Шалгалтын тест
                                    </a>
                            </div>
                            </li>
                        @endcan()
                        @can('user')
                        <a href="#" class="nav-link">Дүрэм</a>
                        <a href="#" class="nav-link">Дүрмийн тест</a>
                        @endcan
                        <li class="nav-item dropdown">
                        

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('actual-user')
                                    <a class="dropdown-item" href="{{route('profile.show', Auth::user())}}">
                                        Профайл
                                    </a>
                                @endcan
                                
                                @can('manage-user')
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">
                                        Хяналтын самбар
                                    </a>
                                @endcan
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Гарах') }}
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

    <main>
        <div class="container_main">
            @include('partials.alerts')
        </div>
        
        @yield('content')
    </main>

</div>

@livewireScripts
</body>
<script> 
	$(document).ready(function () {
    $("a#surgalt").bind('click', function () {
        $('html,body').animate({
        scrollTop: $("#one").offset().top},
        'slow');
    });
});
$(document).ready(function () {
    $("a#salbar").bind('click', function () {
        $('html,body').animate({
        scrollTop: $("#two").offset().top},
        'slow');
    });
});
	</script>
</html>
