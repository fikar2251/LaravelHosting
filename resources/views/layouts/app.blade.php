<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @auth
    <!-- ADMIN START -->
        @role('admin')
            @include('layouts.components.admin.head')
        @endrole
        <!-- ADMIN END -->

        <!-- ==================================== -->

        <!-- PEGAWAI START -->
        @role('pegawai')
            @include('layouts.components.pegawai.head')
        @endrole
    <!-- PEGAWAI END -->
    @endauth
    <!-- ==================================== -->
    @guest
    @include('layouts.components.admin.head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endguest
</head>

<body class="main-body app sidebar-mini">
    <!-- HEADER -->
    @auth
        @role('admin')
            @include('layouts.components.admin.navbar')
            @include('layouts.components.admin.menu')
        @endrole
        @role('pegawai')
            @include('layouts.components.pegawai.navbar')
            @include('layouts.components.pegawai.menu')
        @endrole
    @endauth

    <div id="app">
        @auth
        <!--Main Content-->
        <div class="main-content px-0 app-content">
            <!--Main Content Container-->
            <div class="container-fluid @role('admin') pd-t-60 @endrole">
                <!--Page Header-->
                @include('layouts.bread')
                <!--Page Header-->
                @role('pegawai')
                    @include('layouts.components.pegawai.sidebar')
                @endrole
                @yield('content')
            </div>
            <!--Main Content Container-->
        </div>
        <!--Main Content-->
        @endauth
        @guest
        <!-- Loader -->
        <div id="loading">
            <img src="{{ asset('assets/img/loader4.svg') }}" class="loader-img" alt="Loader">
        </div>
        @yield('content')
        @endguest
    </div>
    <!-- FOOTER -->
    @auth
        @role('admin')
            @include('layouts.components.admin.sidebar')
            @include('layouts.components.admin.footer')
        @endrole
        @role('pegawai')
            @include('layouts.components.pegawai.sidebar')
            @include('layouts.components.pegawai.footer')
        @endrole
    @endauth

    @auth
        <!-- ADMIN START -->
        @role('admin')
            @include('layouts.components.admin.script')
        @endrole
    <!-- ADMIN END -->

    <!-- ==================================== -->

    <!-- PEGAWAI START -->
        @role('pegawai')
            @include('layouts.components.pegawai.script')
        @endrole
    <!-- PEGAWAI END -->
    @endauth

    @include('sweetalert::alert')
    @guest
        @include('layouts.components.admin.script')
    @endguest
</body>

</html>