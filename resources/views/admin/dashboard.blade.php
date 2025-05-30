<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CEO Dashboard') - {{ config('app.name', 'MarketPro E-commerce') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- CSRF Token untuk semua form --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #1e3a8a; /* Tailwind: blue-800 */
            --accent-gold: #f59e0b;  /* Tailwind: amber-500 */
            --light-bg: #f8fafc;    /* Tailwind: slate-50 */
            --dark-blue: #1e40af;   /* Tailwind: blue-700 */
            --hover-blue: #3b82f6;  /* Tailwind: blue-500 */
            --text-dark: #1e293b;   /* Tailwind: slate-800 */
            --border-light: #e2e8f0;/* Tailwind: slate-200 */
            --success: #10b981;     /* Tailwind: emerald-500 */
            --warning: #f59e0b;     /* Tailwind: amber-500 */
            --danger: #ef4444;      /* Tailwind: red-500 */
            --bs-primary: var(--primary-blue);
            --bs-success: var(--success);
            --bs-info: var(--hover-blue);
            --bs-warning: var(--warning);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0; /* slate-200 */
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8; /* slate-400 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b; /* slate-500 */
        }

        /* === KPI Card CSS (dipertahankan dari kode asli Anda dengan sedikit penyesuaian untuk Tailwind) === */
        /* Ini akan relevan jika konten yang di-yield menggunakan kelas-kelas ini */
        .kpi-card-custom .card-body {
            padding: 1.25rem;
        }
        .kpi-card-custom .text-xs {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .kpi-card-custom .h5 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0;
        }
        .kpi-card-custom .text-gray-300-custom {
            color: #d1d5db !important;
        }
        .kpi-card-custom .text-gray-800-custom {
            color: var(--text-dark, #1f2937) !important;
        }
        .kpi-card-custom .border-left-primary { border-left: .30rem solid var(--bs-primary) !important; }
        .kpi-card-custom .border-left-success { border-left: .30rem solid var(--bs-success) !important; }
        .kpi-card-custom .border-left-info { border-left: .30rem solid var(--bs-info) !important; }
        .kpi-card-custom .border-left-warning { border-left: .30rem solid var(--bs-warning) !important; }

        .kpi-card-custom .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .kpi-card-custom .no-gutters > .col,
        .kpi-card-custom .no-gutters > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
        .kpi-card-custom .mr-2-custom {
            margin-right: .5rem !important;
        }
        .kpi-card-custom .shadow-custom {
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }
        .kpi-card-custom .card-footer {
            background-color: #f9fafb;
            border-top: 1px solid var(--border-light);
            padding: 0.75rem 1.25rem;
            text-align: center;
            font-size: 0.875rem;
        }
        .kpi-card-custom .card-footer a {
            color: #6b7280 !important;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .kpi-card-custom .card-footer:hover a,
        .kpi-card-custom .card-footer:hover {
            color: var(--primary-blue) !important;
            background-color: #f3f4f6;
        }
        .kpi-card-custom .stretched-link::after {
            position: absolute; top: 0; right: 0; bottom: 0; left: 0; z-index: 1; content: "";
        }
        .kpi-card-custom {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 0.75rem;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .content-to-animate > .row, .content-to-animate > div { /* Target elemen yang lebih spesifik untuk animasi */
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .content-to-animate > .row:nth-child(2), .content-to-animate > div:nth-child(2) { animation-delay: 0.1s; }
        .content-to-animate > .row:nth-child(3), .content-to-animate > div:nth-child(3) { animation-delay: 0.2s; }

        /* Styling untuk notifikasi dari layout produk */
        .alert-tailwind {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
        }
        .alert-success-tailwind {
            background-color: #dcfce7;
            border-left-width: 4px;
            border-color: #22c55e;
            color: #15803d;
        }
        .alert-danger-tailwind {
            background-color: #fee2e2;
            border-left-width: 4px;
            border-color: #ef4444;
            color: #b91c1c;
        }
        .alert-danger-tailwind ul {
            margin-bottom: 0;
            list-style-position: inside;
            padding-left: 0;
        }
        .table th, .table td { vertical-align: middle; font-size: 0.9rem; }
        .table th { font-weight: 600; }
        .product-description-short {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
    @yield('styles')
</head>

<body class="text-slate-800">
    <div id="sidebar" class="fixed left-0 top-0 z-40 h-screen bg-gradient-to-b from-blue-800 to-blue-700 text-slate-100 transition-all duration-300 ease-in-out w-72 shadow-lg print:hidden">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-center p-6 border-b border-blue-600/50 h-24">
                <i class="fas fa-crown text-3xl text-amber-400 mr-3 sidebar-icon"></i>
                <div class="sidebar-text-content">
                    <h2 class="text-xl font-extrabold text-white whitespace-nowrap">
                        {{ config('app.name', 'MarketPro') }}
                    </h2>
                    <p class="text-xs text-blue-200 whitespace-nowrap">CEO Executive Dashboard</p>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <div class="mb-6">
                    <h3 class="px-4 mb-2 text-xs font-semibold uppercase text-blue-300 tracking-wider sidebar-text-content">Executive Overview</h3>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-slate-100 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                        <i class="fas fa-chart-line fa-fw w-6 text-lg mr-4 text-blue-300 group-hover:text-amber-300 transition-colors duration-200 sidebar-icon"></i>
                        <span class="font-medium sidebar-text-content">Dashboard Utama</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg text-slate-100 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                        <i class="fas fa-box fa-fw w-6 text-lg mr-4 text-blue-300 group-hover:text-amber-300 transition-colors duration-200 sidebar-icon"></i>
                        <span class="font-medium sidebar-text-content">Kelola Produk</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 rounded-lg text-slate-100 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                        <i class="fas fa-shopping-cart fa-fw w-6 text-lg mr-4 text-blue-300 group-hover:text-amber-300 transition-colors duration-200 sidebar-icon"></i>
                        <span class="font-medium sidebar-text-content">Kelola Pesanan</span>
                    </a>
                </div>

                <div>
                    <h3 class="px-4 mb-2 text-xs font-semibold uppercase text-blue-300 tracking-wider sidebar-text-content">Platform Management</h3>
                    <a href="#" class="flex items-center px-4 py-3 rounded-lg text-slate-100 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                        <i class="fas fa-store-alt fa-fw w-6 text-lg mr-4 text-blue-300 group-hover:text-amber-300 transition-colors duration-200 sidebar-icon"></i>
                        <span class="font-medium sidebar-text-content">Kelola Merchant</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 rounded-lg text-slate-100 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                        <i class="fas fa-users fa-fw w-6 text-lg mr-4 text-blue-300 group-hover:text-amber-300 transition-colors duration-200 sidebar-icon"></i>
                        <span class="font-medium sidebar-text-content">Kelola User Pembeli</span>
                    </a>
                </div>
            </nav>

            <div class="p-6 mt-auto border-t border-blue-600/50">
                 <form id="logoutFormCEO" action="{{ route('admin.logout') }}" method="POST" style="display: none;"> @csrf </form>
                <a href="#" id="logoutButtonCEO" class="flex items-center justify-center w-full px-4 py-3 rounded-lg bg-red-600/80 hover:bg-red-500 text-white font-medium transition-colors duration-200 group">
                    <i class="fas fa-sign-out-alt fa-fw w-6 text-lg mr-3 text-red-200 group-hover:text-white transition-colors duration-200 sidebar-icon"></i>
                    <span class="sidebar-text-content">Logout</span>
                </a>
            </div>
        </div>
    </div>

    <div id="main-content" class="ml-72 transition-all duration-300 ease-in-out print:ml-0">
        <div class="sticky top-0 z-30 bg-white shadow-md print:hidden">
            <div class="px-6 py-4 flex items-center justify-between h-24">
                <div class="flex items-center">
                    <button id="hamburger-menu" class="mr-4 text-slate-600 hover:text-blue-600 lg:hidden">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                     <button id="desktop-hamburger-menu" class="mr-4 text-slate-600 hover:text-blue-600 hidden lg:block">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-amber-500">@yield('page_title', 'Dashboard')</h1>
                        <p class="text-sm text-slate-500">Selamat datang, {{ $adminName ?? Auth::user()->name ?? 'CEO' }}!</p>
                    </div>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="relative">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-slate-100 transition-colors" id="profileDropdownButton">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-amber-500 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr($adminName ?? Auth::user()->name ?? 'AD', 0, 2)) }}
                            </div>
                            <div class="hidden md:block text-left">
                                <div class="text-sm font-semibold text-slate-700">{{ $adminName ?? Auth::user()->name ?? 'Admin User' }}</div>
                                <div class="text-xs text-slate-500">Administrator</div>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-slate-400 hidden md:block"></i>
                        </button>
                        <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl z-50 hidden origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="profileDropdownButton">
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" role="menuitem">Profil Saya</a>
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" role="menuitem">Pengaturan</a>
                                <button onclick="document.getElementById('logoutFormCEO').submit();" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700" role="menuitem">
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="p-6">
            @if (session('success'))
                <div class="alert-tailwind alert-success-tailwind mb-6">
                    {{ session('success') }}
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" onclick="this.parentElement.style.display='none'" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert-tailwind alert-danger-tailwind mb-6">
                    {{ session('error') }}
                     <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" onclick="this.parentElement.style.display='none'" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
             @if ($errors->any())
                <div class="alert-tailwind alert-danger-tailwind mb-6">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const hamburgerMenu = document.getElementById('hamburger-menu'); // Mobile
            const desktopHamburgerMenu = document.getElementById('desktop-hamburger-menu'); // Desktop
            const sidebarTextContents = document.querySelectorAll('.sidebar-text-content');
            const sidebarIcons = document.querySelectorAll('.sidebar-icon');

            function applySidebarState(isCollapsed) {
                if (isCollapsed) {
                    sidebar.classList.add('w-20');
                    sidebar.classList.remove('w-72');
                    mainContent.classList.add('ml-20');
                    mainContent.classList.remove('ml-72');
                    sidebarTextContents.forEach(el => el.classList.add('lg:hidden'));
                    sidebarIcons.forEach(el => {
                        el.classList.add('lg:mx-auto');
                        el.classList.remove('mr-3', 'mr-4');
                    });
                } else {
                    sidebar.classList.add('w-72');
                    sidebar.classList.remove('w-20');
                    mainContent.classList.add('ml-72');
                    mainContent.classList.remove('ml-20');
                    sidebarTextContents.forEach(el => el.classList.remove('lg:hidden'));
                    sidebarIcons.forEach(el => {
                        el.classList.remove('lg:mx-auto');
                        if (el.parentElement.querySelector('span.sidebar-text-content:not(.lg\\:hidden)')) {
                           if(el.closest('.sidebar-header') || el.closest('#logoutButtonCEO')) {
                               el.classList.add('mr-3');
                           } else {
                               el.classList.add('mr-4');
                           }
                        }
                    });
                }
            }

            let isDesktopSidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (window.innerWidth > 1024) {
                applySidebarState(isDesktopSidebarCollapsed);
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-72');
                mainContent.classList.remove('ml-20', 'ml-72');
            }


            if (hamburgerMenu) {
                hamburgerMenu.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarTextContents.forEach(el => el.classList.remove('lg:hidden'));
                     sidebarIcons.forEach(el => {
                        el.classList.remove('lg:mx-auto');
                         if (el.parentElement.querySelector('span')) {
                           if(el.closest('.sidebar-header') || el.closest('#logoutButtonCEO')) {
                               el.classList.add('mr-3');
                           } else {
                               el.classList.add('mr-4');
                           }
                        }
                    });
                });
            }

            if (desktopHamburgerMenu) {
                desktopHamburgerMenu.addEventListener('click', () => {
                    isDesktopSidebarCollapsed = !sidebar.classList.contains('w-20'); // Toggle state
                    applySidebarState(isDesktopSidebarCollapsed);
                    localStorage.setItem('sidebarCollapsed', isDesktopSidebarCollapsed.toString());
                });
            }

            document.addEventListener('click', (event) => {
                if (window.innerWidth <= 1024 && !sidebar.classList.contains('-translate-x-full') &&
                    !sidebar.contains(event.target) && hamburgerMenu && !hamburgerMenu.contains(event.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            const profileDropdownButton = document.getElementById('profileDropdownButton');
            const profileDropdownMenu = document.getElementById('profileDropdownMenu');

            if (profileDropdownButton && profileDropdownMenu) {
                profileDropdownButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    profileDropdownMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function(event) {
                    if (!profileDropdownButton.contains(event.target) && !profileDropdownMenu.contains(event.target)) {
                        profileDropdownMenu.classList.add('hidden');
                    }
                });
            }

            const logoutButtonCEO = document.getElementById('logoutButtonCEO');
            if(logoutButtonCEO) {
                logoutButtonCEO.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('logoutFormCEO').submit();
                });
            }

            const currentPath = window.location.pathname;
            const sidebarLinks = document.querySelectorAll('#sidebar nav a');
            const adminDashboardRoute = "{{ route('admin.dashboard') }}"; // Simpan route ke variabel

            sidebarLinks.forEach(link => {
                const linkPath = link.getAttribute('href');
                link.classList.remove('bg-blue-700', 'text-white', 'font-semibold', 'shadow-inner', 'active-link');

                let isActive = false;
                if (linkPath === adminDashboardRoute && (currentPath === adminDashboardRoute || currentPath === '/admin/dashboard' || currentPath.includes('ceo-dashboard') )) { // Penanganan khusus untuk dashboard utama
                    isActive = true;
                } else if (linkPath !== '#' && linkPath !== adminDashboardRoute && currentPath.startsWith(linkPath)) {
                    isActive = true;
                }

                if (isActive) {
                    link.classList.add('bg-blue-700', 'text-white', 'font-semibold', 'shadow-inner', 'active-link');
                }
            });

            // Jika tidak ada link aktif dan kita berada di dashboard, aktifkan link dashboard
            if (!document.querySelector('#sidebar nav a.active-link') && (currentPath === adminDashboardRoute || currentPath === '/admin/dashboard' || currentPath.includes('ceo-dashboard'))) {
                 const dashboardLink = document.querySelector(`#sidebar nav a[href="${adminDashboardRoute}"]`);
                 if(dashboardLink) {
                    dashboardLink.classList.add('bg-blue-700', 'text-white', 'font-semibold', 'shadow-inner', 'active-link');
                 }
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
