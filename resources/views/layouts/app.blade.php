<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/logo.png" alt="" width="70">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
{{--                        @if( Auth::user()->tipo=='ADMIN')--}}
                        @auth
                        @if(Auth::user()->tipo=='ADMIN')
                        <router-link
                            to="/usuarios"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-user"></i> Usuarios

                                </a>
                            </li>
                        </router-link>
                        @endif
{{--                        @endif--}}
                        @if(Auth::user()->id=='10' || Auth::user()->id=='9' || Auth::user()->id=='6' || Auth::user()->id=='15' || Auth::user()->id=='16' || Auth::user()->id=='2')
                        <router-link
                            to="/registrados"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-file"></i> Registrados
                                </a>
                            </li>
                        </router-link>
                        @endif
                        <router-link
                            to="/revisar"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-eye"></i> Revisar
                                </a>
                            </li>
                        </router-link>
                        @if(Auth::user()->id=='1' )

                        <router-link
                            to="/actualizar"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-address-book"></i> Actualizar
                                </a>
                            </li>
                        </router-link>
                        @endif
                        @if(Auth::user()->id=='2')
                        <router-link
                            to="/especial"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-address-book"></i> Especial
                                </a>
                            </li>
                        </router-link>
                        @endif
                        <router-link
                            to="/registrar"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-add"></i> Registrar
                                </a>
                            </li>
                        </router-link>
                        <router-link
                            to="/reportes"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-chart"></i> Reportes
                                </a>
                            </li>
                        </router-link>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
