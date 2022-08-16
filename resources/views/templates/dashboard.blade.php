<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('templates/alerts')
    
    <div class="min-h-screen w-full flex flex-row bg-gray">
        {{-- Sidebar --}}
        <div class="sidebar hidden z-30 absolute flex flex-col w-60 bg-dark overflow-hidden min-h-screen shadow-md">
            <div class="flex items-center py-3 px-5 shadow-sm shadow-secondary">
                <span class="text-2xl text-gray top-5 left-4 cursor-pointer flex items-center" onclick="openSidebar()">
                    <i class="bx bx-x mr-3"></i> <img src="{{ asset('img/logo-merah.png') }}" alt="">
                </span>
            </div>
            <ul class="flex flex-col px-2 py-4 [&>li>a]:text-gray [&>li>a]:flex [&>li>a]:flex-row [&>li>a]:items-center [&>li>a]:h-12">
                <li>
                    <a href="/" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home {{ Request::is('/') ? 'text-danger' : '' }}"></i></span>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/pengaduan/create" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bxs-edit {{ Request::is('pengaduan/create') ? 'text-danger' : '' }}"></i></span>
                        <span class="text-sm font-medium">Buat Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="/pengaduan" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-notepad {{ Request::is('pengaduan') ? 'text-danger' : '' }}"></i></span>
                        <span class="text-sm font-medium">Semua Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out"></i></span>
                        <span class="text-sm font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

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

    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
