<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEO Dashboard - {{ config('app.name', 'MarketPro E-commerce') }}</title>
    {{-- CSRF Token jika Anda akan menambahkan form nanti --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #1e3a8a;
            --accent-gold: #f59e0b;
            --light-bg: #f8fafc;
            --dark-blue: #1e40af;
            --hover-blue: #3b82f6;
            --text-dark: #1e293b;
            --border-light: #e2e8f0;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
            --success: #10b981;
            /* Digunakan oleh KPI card versi saya */
            --warning: #f59e0b;
            /* Digunakan oleh KPI card versi saya */
            --danger: #ef4444;
            /* Warna Bootstrap untuk konsistensi KPI card versi saya */
            --bs-primary: var(--primary-blue);
            --bs-success: var(--success);
            --bs-info: var(--hover-blue);
            /* Warna info untuk KPI card */
            --bs-warning: var(--warning);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* === Semua CSS dari HTML Asli Anda === */
        /* Sidebar Styling */
        .sidebar {
            width: 300px;
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 6px 0 25px rgba(0, 0, 0, 0.15);
        }

        .sidebar.collapsed {
            width: 90px;
        }

        .sidebar-header {
            padding: 2.5rem 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .sidebar-header h2 {
            color: white;
            font-weight: 800;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #fff, var(--accent-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .sidebar-header h2,
        .sidebar.collapsed .sidebar-header p {
            opacity: 0;
            width: 0;
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .sidebar-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            font-weight: 500;
            margin: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
        }

        .menu-section {
            margin-bottom: 2rem;
        }

        .menu-section-title {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 2rem 1rem 2rem;
            margin-bottom: 0.5rem;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s ease, padding 0.3s ease;
        }

        .sidebar.collapsed .menu-section-title {
            opacity: 0;
            height: 0;
            padding: 0;
            overflow: hidden;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            padding: 1.2rem 2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
            position: relative;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.12);
            border-left-color: var(--accent-gold);
            color: white;
            transform: translateX(8px);
        }

        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.18);
            border-left-color: var(--accent-gold);
            color: white;
        }

        .sidebar-menu a i {
            margin-right: 1.2rem;
            width: 22px;
            text-align: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .sidebar.collapsed .sidebar-menu a span,
        .sidebar.collapsed .badge-notification {
            display: none;
        }

        .sidebar.collapsed .sidebar-menu a {
            justify-content: center;
            padding: 1.2rem 0;
            border-left: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar.collapsed .sidebar-menu a:hover {
            transform: none;
        }

        .badge-notification {
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 12px;
            margin-left: auto;
        }

        .logout-section {
            position: absolute;
            bottom: 2rem;
            width: 100%;
            padding: 0 2rem;
        }

        .sidebar.collapsed .logout-section {
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            padding: 1.2rem;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            width: 100%;
            justify-content: flex-start;
        }

        .sidebar.collapsed .logout-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            padding: 0;
            justify-content: center;
            align-items: center;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            transform: translateY(-3px);
        }

        .sidebar.collapsed .logout-btn:hover {
            transform: none;
        }

        .logout-btn i {
            margin-right: 1rem;
        }

        .sidebar.collapsed .logout-btn i {
            margin-right: 0;
            font-size: 1.3rem;
        }

        .sidebar.collapsed .logout-btn span {
            display: none;
        }

        /* Main Content */
        .main-content {
            margin-left: 300px;
            min-height: 100vh;
            background-color: var(--light-bg);
            transition: margin-left 0.3s ease;
        }

        .main-content.sidebar-collapsed {
            margin-left: 90px;
        }

        /* Top Navigation */
        .top-nav {
            background: white;
            padding: 2rem 2.5rem;
            box-shadow: var(--shadow);
            border-bottom: 1px solid var(--border-light);
            position: sticky;
            top: 0;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hamburger-menu {
            font-size: 1.5rem;
            color: var(--primary-blue);
            cursor: pointer;
            margin-right: 1.5rem;
            display: none;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-grow: 1;
        }

        .nav-title h1 {
            color: var(--primary-blue);
            font-weight: 800;
            font-size: 2rem;
            margin: 0;
            background: linear-gradient(45deg, var(--primary-blue), var(--accent-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-subtitle {
            color: #64748b;
            font-size: 1rem;
            margin: 0.5rem 0 0 0;
            font-weight: 500;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .quick-action-btn {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .quick-action-btn:hover {
            background: var(--hover-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .notification-btn {
            position: relative;
            background: var(--light-bg);
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 0.8rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .notification-btn:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .ceo-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 1.5rem;
            background: var(--light-bg);
            border-radius: 30px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .ceo-profile:hover {
            border-color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .ceo-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-gold));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .ceo-info h6 {
            margin: 0;
            color: var(--primary-blue);
            font-weight: 700;
        }

        .ceo-info small {
            color: #64748b;
            font-weight: 500;
        }

        /* Styles untuk .dashboard-content dari HTML Asli Anda (jika ada yang mau dipertahankan) */
        /* Saya akan menimpanya dengan versi saya di bawah, tapi Anda bisa merge jika perlu */
        .dashboard-content {
            padding: 2.5rem;
        }

        /* Padding dari HTML Asli Anda */

        /* Responsive Design dari HTML Asli Anda */
        @media (max-width: 1400px) {
            /* .executive-summary { grid-template-columns: 1fr; } */
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 0;
            }

            .sidebar.collapsed {
                width: 0;
            }

            .sidebar.show {
                transform: translateX(0%);
                width: 300px;
            }

            .main-content,
            .main-content.sidebar-collapsed {
                margin-left: 0;
            }

            .hamburger-menu {
                display: block;
            }

            /* .kpi-grid { grid-template-columns: 1fr; } */
            /* Dari HTML Asli, tidak terpakai di versi saya */
            .nav-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .nav-actions {
                width: 100%;
                justify-content: space-around;
                margin-top: 1rem;
            }

            .quick-action-btn,
            .notification-btn,
            .ceo-profile {
                flex-shrink: 0;
            }

            .dashboard-content {
                padding: 1.5rem;
            }

            /* Padding dari HTML Asli Anda untuk mobile */
        }

        /* Animations & Scrollbar dari HTML Asli Anda */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-content>.row {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Animasi per baris KPI */
        .dashboard-content>.row:nth-child(2) {
            animation-delay: 0.1s;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--hover-blue);
        }

        /* === CSS Tambahan untuk KPI Card Versi Saya === */
        .kpi-card-custom .card-body {
            padding: 1rem;
        }

        .kpi-card-custom .text-xs {
            font-size: .75rem;
            font-weight: 700;
        }

        .kpi-card-custom .h5 {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .kpi-card-custom .text-gray-300 {
            color: #c5c6cb !important;
        }

        .kpi-card-custom .text-gray-800 {
            color: var(--text-dark, #3a3b45) !important;
        }

        .kpi-card-custom .border-left-primary {
            border-left: .30rem solid var(--bs-primary) !important;
        }

        .kpi-card-custom .border-left-success {
            border-left: .30rem solid var(--bs-success) !important;
        }

        .kpi-card-custom .border-left-info {
            border-left: .30rem solid var(--bs-info) !important;
        }

        .kpi-card-custom .border-left-warning {
            border-left: .30rem solid var(--bs-warning) !important;
        }

        .kpi-card-custom .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }

        .kpi-card-custom .no-gutters>.col,
        .kpi-card-custom .no-gutters>[class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }

        .kpi-card-custom .mr-2 {
            margin-right: .5rem !important;
        }

        .kpi-card-custom .shadow {
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }

        .kpi-card-custom .card-footer {
            background-color: #f8f9fc;
            border-top: 1px solid #e3e6f0;
            padding: 0.5rem 1rem;
            text-align: center;
            font-size: 0.8rem;
        }

        .kpi-card-custom .card-footer a {
            color: #858796 !important;
            text-decoration: none;
        }

        .kpi-card-custom .card-footer:hover a,
        .kpi-card-custom .card-footer:hover {
            color: var(--primary-blue) !important;
            background-color: #e9ecef;
        }

        .kpi-card-custom .stretched-link::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            content: "";
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-crown"></i> {{ config('app.name', 'MarketPro') }}</h2>
            <p>CEO Executive Dashboard</p>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Executive Overview</div>
                <a href="#" class="active">
                    <i class="fas fa-chart-line"></i> <span>Dashboard Utama</span>
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="{{ (isset($show_section) && $show_section == 'manage_products') || request()->routeIs('admin.products.index') ? 'active' : '' }}">
                    <i class="fas fa-box"></i> <span>Kelola Produk</span>
                </a>
                <a href="#"> <i class="fas fa-shopping-cart"></i> <span>Kelola Pesanan</span> </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Platform Management</div>
                <a href="#"> <i class="fas fa-store-alt"></i> <span>Kelola Merchant</span> </a>
                <a href="#"> <i class="fas fa-users"></i> <span>Kelola User Pembeli</span> </a>
            </div>
        </nav>

        <div class="logout-section">
            <a href="#" class="logout-btn" onclick="alert('Logout clicked. Implement Laravel logout.');">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </a>
            @csrf
            </form>
        </div>
    </div>

    <div class="main-content" id="main-content">
        <div class="top-nav">
            <div class="hamburger-menu" id="hamburger-menu">
                <i class="fas fa-bars"></i>
            </div>
            <div class="nav-content">
                <div class="nav-title">
                    <h1>Dashboard Utama</h1>
                    <p class="nav-subtitle">Selamat datang, CEO! Secoya.</p>
                </div>
                <div class="nav-actions">
                    {{-- <button class="quick-action-btn"><i class="fas fa-plus"></i> Quick Action</button> --}}
                    {{-- <button class="notification-btn"><i class="fas fa-bell"></i><span class="notification-badge">12</span></button> --}}
                    <div class="ceo-profile">
                        <div class="ceo-avatar">{{-- strtoupper(substr(Auth::user()->name ?? 'CEO', 0, 2)) --}} C</div>
                        <div class="ceo-info">
                            <h6>{{-- Auth::user()->name ?? --}} Alexander Smith</h6>
                            <small>Chief Executive Officer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ====================================================================== --}}
        {{-- =========== KONTEN DASHBOARD UTAMA (KPI CARDS VERSI SAYA) ============ --}}
        {{-- ====================================================================== --}}
        <div class="dashboard-content"> {{-- Ini adalah div pembungkus dari HTML asli Anda --}}
            <div class="container-fluid px-md-4 py-4"> {{-- px-md-4 agar padding lebih pas di mobile --}}

                {{-- Baris untuk KPI Cards --}}
                <div class="row">
                    {{-- KPI Card: Total Produk --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                        <div class="card kpi-card-custom border-left-primary shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs text-primary text-uppercase mb-1">
                                            Total Produk</div>
                                        <div class="h5 mb-0 text-gray-800">{{ $totalProducts ?? '1,250' }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-box fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- KPI Card: Total Pesanan --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                        <div class="card kpi-card-custom border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs text-success text-uppercase mb-1">
                                            Total Pesanan</div>
                                        <div class="h5 mb-0 text-gray-800">{{ $totalOrders ?? '3,480' }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- KPI Card: Total Akun Penjual --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                        <div class="card kpi-card-custom border-left-info shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs text-info text-uppercase mb-1">
                                            Total Akun Penjual</div>
                                        <div class="h5 mb-0 text-gray-800">{{ $totalSellers ?? '215' }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-store fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- KPI Card: Total Akun Pembeli --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                        <div class="card kpi-card-custom border-left-warning shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs text-warning text-uppercase mb-1">
                                            Total Akun Pembeli</div>
                                        <div class="h5 mb-0 text-gray-800">{{ $totalBuyers ?? '10,500' }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pesan Selamat Datang --}}
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3"
                                style="background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));">
                                <h5 class="m-0 font-weight-bold text-white">Informasi Platform</h5>
                            </div>
                            <div class="card-body">
                                <p>Selamat datang kembali, <strong>{{-- $adminName ?? Auth::user()->name ?? --}} Alexander Smith
                                        (CEO)</strong>!</p>
                                <p class="mb-0">Ini adalah ringkasan data terkini dari platform MarketPro. Gunakan
                                    menu di samping untuk navigasi dan melakukan pengelolaan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- End of container-fluid --}}
        </div> {{-- End of dashboard-content (bagian konten utama saya) --}}
        {{-- ====================================================================== --}}
        {{-- ======================= AKHIR KONTEN DASHBOARD UTAMA ================= --}}
        {{-- ====================================================================== --}}

    </div> {{-- End of main-content --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    {{-- Chart.js jika Anda mengaktifkan kembali chart --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    <script>
        // Sidebar Toggle JS dari HTML Asli Anda
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const hamburgerMenu = document.getElementById('hamburger-menu');

        if (hamburgerMenu) {
            hamburgerMenu.addEventListener('click', () => {
                sidebar.classList.toggle('show'); // Untuk mobile: tampilkan/sembunyikan
                // Untuk desktop: collapse/expand
                if (window.innerWidth > 768) {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('sidebar-collapsed');
                }
            });
        }

        document.addEventListener('click', (event) => {
            if (window.innerWidth <= 768 && sidebar.classList.contains('show') &&
                !sidebar.contains(event.target) && !hamburgerMenu.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });

        window.addEventListener('load', () => {
            if (window.innerWidth > 768) {
                // Inisialisasi collapsed di desktop jika tidak ada preferensi lain
                if (!sidebar.classList.contains(
                    'keep-open-on-load')) { // Anda bisa tambahkan class ini jika ingin override
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('sidebar-collapsed');
                }
            }
        });
        // Jika Anda ingin efek hover di desktop (dari HTML Asli Anda)
        if (window.innerWidth > 768) {
            sidebar.addEventListener('mouseenter', () => {
                if (sidebar.classList.contains('collapsed')) { // Hanya expand jika sedang collapsed
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('sidebar-collapsed');
                }
            });
            sidebar.addEventListener('mouseleave', () => {
                //  Untuk menghindari auto-collapse jika sidebar mobile sedang 'show' dan layar diresize.
                if (!sidebar.classList.contains('show')) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('sidebar-collapsed');
                }
            });
        }

        // Chart.js (dari HTML Asli Anda, data statis) - Uncomment jika Anda ingin menampilkannya
        /*
        const ctx = document.getElementById('performanceChart')?.getContext('2d');
        if (ctx) {
            const performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'],
                    datasets: [{
                        label: 'Revenue (in Billions IDR)',
                        data: [1.8, 2.0, 2.2, 2.1, 2.3, 2.4, 2.5],
                        borderColor: 'var(--primary-blue)',
                        backgroundColor: 'rgba(30, 58, 138, 0.1)',
                        tension: 0.4, fill: true, pointBackgroundColor: 'var(--accent-gold)',
                        pointBorderColor: 'var(--accent-gold)', pointRadius: 5, pointHoverRadius: 7,
                    },
                    {
                        label: 'Active Merchants (in Thousands)',
                        data: [10, 10.5, 11, 11.5, 12, 12.3, 12.5],
                        borderColor: 'var(--success)',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4, fill: true, pointBackgroundColor: 'var(--success)',
                        pointBorderColor: 'var(--success)', pointRadius: 5, pointHoverRadius: 7,
                    }]
                },
                options: { // Opsi chart dari HTML Asli Anda ... }
            });

            document.querySelectorAll('.filter-btn').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    // Logika update chart dari HTML Asli Anda ...
                });
            });
        }
        */
    </script>
</body>

</html>
