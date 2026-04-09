<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title', 'Sistem Pengolahan Data Gereja')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="logo">
                <h2>Sistem Gereja</h2>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('mockup.dashboard') }}" class="nav-link {{ request()->routeIs('mockup.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('mockup.jemaat.index') }}" class="nav-link {{ request()->routeIs('mockup.jemaat.*') ? 'active' : '' }}">Data Jemaat</a></li>
                    <li><a href="{{ route('mockup.jadwal.index') }}" class="nav-link {{ request()->routeIs('mockup.jadwal.*') ? 'active' : '' }}">Jadwal Ibadah</a></li>
                    <li><a href="{{ route('mockup.keuangan.index') }}" class="nav-link {{ request()->routeIs('mockup.keuangan.*') ? 'active' : '' }}">Keuangan</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1 id="page-title">@yield('page-title', 'Dashboard Utama')</h1>
                <div class="user-info">
                    <span>Admin</span>
                </div>
            </header>

            <div id="content-area" class="content-area">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
