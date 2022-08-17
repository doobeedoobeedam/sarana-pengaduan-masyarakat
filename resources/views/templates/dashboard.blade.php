<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('templates/alerts')

    <div class="min-h-screen w-full flex flex-row bg-gray">
        {{-- Sidebar --}}
        @include('templates/sidebar')

        {{-- Navbar --}}
        <nav class="top-0 w-full absolute flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-sm bg-white">
            <div class="w-full flex justify-between items-center px-3">
                <span class="text-2xl text-danger top-5 cursor-pointer flex items-center" onclick="openSidebar()">
                    <i class="bx bx-menu mr-3"></i> <img src="{{ asset('img/logo.png') }}" alt="">
                </span>
                <span class="text-dark top-5 items-center">
                    <span class="mr-2 font-medium">Kusuma Wecitra</span>
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-danger" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </span>
            </div>
        </nav>
        
        <div class="container w-full mx-auto mt-24 px-10 lg:px-4">
            @yield('content')
        </div>
    </div>

    @include('templates/modal');
    <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-secondary bg-opacity-40"></div>

    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
