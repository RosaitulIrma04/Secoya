<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'MarketPro') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #1e3a8a;
            --dark-blue: #1c2e6b;
            --light-blue: #e0f2fe;
            --text-dark: #1e293b;
            --text-muted: #6b7280;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --bs-primary: var(--primary-blue);
            --bs-success: #10b981;
            --bs-info: #3b82f6;
            --bs-warning: #f59e0b;
            --bs-danger: #ef4444;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            overflow-x: hidden;
            display: flex; /* Menggunakan flexbox untuk layout utama */
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 300px;
            background: linear-gradient(180deg, var(--primary-blue), var(--dark-blue));
            color: #ffffff;
            padding: 2rem 1.5rem;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            position: fixed; /* Sidebar tetap di tempatnya */
            height: 100%;
            overflow-y: auto; /* Untuk scroll jika konten sidebar banyak */
            transition: all 0.3s ease;
            z-index: 1000; /* Pastikan di atas konten lain */
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar.collapsed .sidebar-header h2 span,
        .sidebar.collapsed .sidebar-header p,
        .sidebar.collapsed .sidebar-menu span,
        .sidebar.collapsed .menu-section-title,
        .sidebar.collapsed .logout-section span {
            display: none;
        }
        .sidebar.collapsed .sidebar-header h2 {
            text-align: center;
        }
        .sidebar.collapsed .sidebar-menu a,
        .sidebar.collapsed .logout-section a {
            justify-content: center;
            padding: 0.75rem 0;
        }
        .sidebar-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .sidebar-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar-header h2 i {
            margin-right: 0.5rem;
            font-size: 2rem;
            color: #fdd835; /* Gold-like color for crown */
        }
        .sidebar-header p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        .sidebar-menu .menu-section {
            margin-bottom: 1.5rem;
        }
        .sidebar-menu .menu-section-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            margin-bottom: 0.75rem;
            padding-left: 1rem;
            letter-spacing: 0.05em;
        }
        .sidebar-menu a, .logout-section a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.5rem;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        .sidebar-menu a i, .logout-section a i {
            margin-right: 1rem;
            font-size: 1.1rem;
            width: 20px; /* Fixed width for icons */
            text-align: center;
        }
        .sidebar-menu a:hover, .logout-section a:hover {
            background-color: rgba(255,255,255,0.15);
            color: #ffffff;
        }
        .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.25);
            color: #ffffff;
            font-weight: 600;
        }
        .logout-section {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.2);
        }
        .logout-section .logout-btn {
            background-color: #dc3545; /* Bootstrap danger color */
            justify-content: center;
        }
        .logout-section .logout-btn:hover {
            background-color: #c82333;
        }

        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            margin-left: 300px; /* Sesuaikan dengan lebar sidebar */
            transition: margin-left 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .main-content.shifted {
            margin-left: 80px; /* Sesuaikan dengan lebar sidebar yang diciutkan */
        }

        /* Top Navigation */
        .top-nav {
            background-color: #ffffff;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .hamburger-menu {
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
            margin-right: 1.5rem;
            transition: color 0.2s ease;
        }
        .hamburger-menu:hover {
            color: var(--primary-blue);
        }
        .nav-content {
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: space-between;
        }
        .nav-title h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }
        .nav-subtitle {
            font-size: 0.9rem;
            color: var(--text-muted);
        }
        .ceo-profile {
            display: flex;
            align-items: center;
        }
        .ceo-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: var(--primary-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            margin-right: 0.75rem;
        }
        .ceo-info h6 {
            margin-bottom: 0;
            font-weight: 600;
            color: var(--text-dark);
        }
        .ceo-info small {
            color: var(--text-muted);
        }

        /* Dashboard Content Area */
        .dashboard-content {
            padding: 2rem;
            flex-grow: 1;
        }

        /* KPI Card Custom (re-styling for Bootstrap) */
        .kpi-card-custom {
            border-radius: 0.75rem;
            overflow: hidden; /* Untuk card-footer */
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Bootstrap default shadow */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .kpi-card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .kpi-card-custom .card-body {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .kpi-card-custom .text-xs {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }
        .kpi-card-custom .h5 {
            font-size: 2.25rem; /* Larger value */
            font-weight: 700;
            color: var(--text-dark);
        }
        .kpi-card-custom .col-auto i {
            font-size: 2.5rem; /* Larger icon */
            color: rgba(0,0,0,0.15); /* Lighter icon color */
        }
        .kpi-card-custom .card-footer {
            background-color: rgba(0,0,0,0.03); /* Light background for footer */
            border-top: 1px solid rgba(0,0,0,0.125);
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            text-align: right;
        }
        .kpi-card-custom .card-footer a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }
        .kpi-card-custom .card-footer a:hover {
            text-decoration: underline;
        }

        /* Specific border colors for KPI cards */
        .kpi-card-custom.border-left-primary { border-left: 0.25rem solid var(--primary-blue) !important; }
        .kpi-card-custom.border-left-success { border-left: 0.25rem solid var(--bs-success) !important; }
        .kpi-card-custom.border-left-info { border-left: 0.25rem solid var(--bs-info) !important; }
        .kpi-card-custom.border-left-warning { border-left: 0.25rem solid var(--bs-warning) !important; }

        /* Table specific styles from products.blade.php */
        .table th, .table td { vertical-align: middle; font-size: 0.9rem; }
        .table th { font-weight: 600; }
        .table .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.8rem; }
        .product-description-short {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                transform: translateX(-100%);
            }
            .sidebar.active {
                width: 250px;
                padding: 2rem 1.5rem;
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .main-content.shifted {
                margin-left: 0; /* No shift on small screens */
            }
            .hamburger-menu {
                display: block; /* Show on small screens */
            }
            .nav-content {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-actions {
                margin-top: 1rem;
                width: 100%;
                justify-content: flex-end;
            }
            .ceo-profile {
                width: 100%;
                justify-content: flex-end;
            }
            .top-nav {
                flex-wrap: wrap;
            }
        }
         @media (min-width: 769px) {
            .hamburger-menu {
                display: none; /* Hide on larger screens */
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-crown"></i> <span>{{ config('app.name', 'MarketPro') }}</span></h2>
            <p>CEO Dashboard</p>
        </div>
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> <span>Dashboard Utama</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Management</div>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                    <i class="fas fa-box"></i> <span>Kelola Produk</span>
                </a>

                <a href="#"> <i class="fas fa-shopping-cart"></i> <span>Kelola Pesanan</span> </a>
                <a href="#"> <i class="fas fa-store-alt"></i> <span>Kelola Merchant</span> </a>
                <a href="#"> <i class="fas fa-users"></i> <span>Kelola User Pembeli</span> </a>
            </div>
        </nav>
        <div class="logout-section">
            <a href="{{ route('admin.logout') }}" class="logout-btn"
               onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </a>
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>

    <div class="main-content" id="main-content">
        <div class="top-nav">
            <div class="hamburger-menu" id="hamburger-menu"> <i class="fas fa-bars"></i> </div>
            <div class="nav-content">
                <div class="nav-title">
                    <h1>@yield('title')</h1>
                    <p class="nav-subtitle">Selamat datang, {{ $adminName ?? 'Admin' }}!</p>
                </div>
                <div class="nav-actions">
                    <div class="ceo-profile">
                        <div class="ceo-avatar">{{ strtoupper(substr($adminName ?? 'A', 0, 1)) }}</div>
                        <div class="ceo-info">
                            <h6>{{ $adminName ?? 'Admin Name' }}</h6>
                            <small>Administrator</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="container-fluid px-md-4 py-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript untuk toggle sidebar
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const hamburgerMenu = document.getElementById('hamburger-menu');

        if (hamburgerMenu) {
            hamburgerMenu.addEventListener('click', () => {
                sidebar.classList.toggle('active'); // Untuk mobile: show/hide sidebar
                mainContent.classList.toggle('shifted'); // Untuk desktop: geser konten
                // Tambahkan/hapus kelas 'collapsed' pada sidebar untuk desktop
                if (window.innerWidth > 768) { // Hanya berlaku untuk desktop
                    sidebar.classList.toggle('collapsed');
                }
            });
        }

        // Handle initial state and resize for desktop collapse
        function adjustLayout() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('shifted');
            } else {
                // Default desktop state: sidebar open, main-content shifted
                sidebar.classList.remove('active'); // Ensure mobile active class is off
                sidebar.classList.remove('collapsed'); // Default to expanded
                mainContent.classList.remove('shifted'); // Default to shifted
            }
        }

        window.addEventListener('load', adjustLayout);
        window.addEventListener('resize', adjustLayout);

    </script>
    @yield('scripts')
</body>
</html>
