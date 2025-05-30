<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(135deg, #f6f9fc 0%, #e9eef3 100%); /* Gradien halus untuk body */
            min-height: 100vh;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #a0a0a0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #808080;
        }

        .sidebar-item.active {
            background-image: linear-gradient(to right, #4f46e5, #7c3aed); /* Gradien Indigo ke Ungu */
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .sidebar-item:hover:not(.active) {
            background-color: #374151; /* Abu-abu lebih gelap saat hover */
        }

        /* Latar belakang untuk area konten utama */
        main {
            background-color: rgba(255, 255, 255, 0.3); /* Putih semi-transparan untuk efek "frosted glass" halus di atas gradien body */
        }

        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
            animation: fadeInSmooth 0.6s ease-out;
        }
        @keyframes fadeInSmooth {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            background-color: white; /* Kartu tetap putih solid */
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.07), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background-image: linear-gradient(to right, #4f46e5, #7c3aed);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(79,70,229,0.25), 0 3px 6px rgba(0,0,0,0.08);
        }
        .btn-success {
            background-image: linear-gradient(to right, #10b981, #34d399);
            color: white;
            transition: all 0.3s ease;
             box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(16,185,129,0.25), 0 3px 6px rgba(0,0,0,0.08);
        }
        .btn-danger {
            background-image: linear-gradient(to right, #ef4444, #f87171);
            color: white;
            transition: all 0.3s ease;
             box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
         .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(239,68,68,0.25), 0 3px 6px rgba(0,0,0,0.08);
        }

        /* Enhanced Table Style */
        .table-wrapper {
            overflow: hidden;
        }
        .table-wrapper table thead {
            background-color: #eef2ff;
        }
        .table-wrapper table thead th {
            color: #4338ca;
            font-weight: 600;
        }
        .table-wrapper table tbody tr:hover {
            background-color: #f4f5f7;
        }
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: capitalize;
        }
        .status-active { background-color: #dcfce7; color: #166534; }
        .status-pending { background-color: #fef9c3; color: #713f12; }
        .status-processed { background-color: #dbeafe; color: #1e40af; }
        .status-out-of-stock { background-color: #fee2e2; color: #991b1b; }
        .status-rejected { background-color: #fee2e2; color: #991b1b; }


        /* Modal Styling */
        .modal-content-custom {
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }
    </style>
</head>
<body>
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-slate-900 text-slate-200 flex flex-col fixed inset-y-0 left-0 z-30 transform md:translate-x-0 -translate-x-full transition-transform duration-300 ease-in-out" id="sidebar">
            <div class="p-5 border-b border-slate-700 flex items-center justify-center space-x-3">
                <i class="fas fa-store fa-2x text-indigo-400"></i>
                <h1 class="text-2xl font-bold text-white">Toko Saya</h1>
            </div>
            <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
                <a href="#" data-target="dashboard" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200 active">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i> Dasbor
                </a>
                <a href="#" data-target="profile" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-user-circle w-5 h-5 mr-3"></i> Profil
                </a>
                <a href="#" data-target="products" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-box-open w-5 h-5 mr-3"></i> Kelola Produk
                </a>
                <a href="#" data-target="orders" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-clipboard-list w-5 h-5 mr-3"></i> Kelola Pesanan
                </a>
                <a href="#" data-target="income" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-chart-line w-5 h-5 mr-3"></i> Kelola Pendapatan
                </a>
                <a href="#" data-target="chat" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-comments w-5 h-5 mr-3"></i> Chat dengan Pembeli
                </a>
            </nav>
            <div class="p-4 border-t border-slate-700">
                <a href="#" id="logoutButton" class="sidebar-item flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i> Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 md:ml-64 p-6 lg:p-8 overflow-y-auto">
            <div class="md:hidden flex justify-between items-center mb-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-store text-indigo-600 text-2xl"></i>
                    <h1 class="text-2xl font-semibold text-gray-800">Dasbor Penjual</h1>
                </div>
                <button id="mobileMenuButton" class="text-gray-600 hover:text-gray-800 p-2 rounded-md hover:bg-gray-200">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>

            <section id="dashboard" class="content-section active">
                <h2 class="text-3xl font-semibold text-gray-800 mb-8">Selamat Datang Kembali! 👋</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-semibold text-gray-700">Total Penjualan</h3>
                            <i class="fas fa-dollar-sign text-2xl text-green-500 p-3 bg-green-100 rounded-full"></i>
                        </div>
                        <p class="text-4xl font-bold text-indigo-600">Rp 15.750.000</p>
                        <p class="text-sm text-green-500 mt-1 font-medium"><i class="fas fa-arrow-up mr-1"></i>5% dari bulan lalu</p>
                    </div>
                    <div class="card p-6">
                         <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-semibold text-gray-700">Pesanan Baru</h3>
                            <i class="fas fa-shopping-cart text-2xl text-blue-500 p-3 bg-blue-100 rounded-full"></i>
                        </div>
                        <p class="text-4xl font-bold text-indigo-600">12</p>
                        <p class="text-sm text-gray-500 mt-1">Menunggu konfirmasi</p>
                    </div>
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-semibold text-gray-700">Produk Aktif</h3>
                             <i class="fas fa-tags text-2xl text-purple-500 p-3 bg-purple-100 rounded-full"></i>
                        </div>
                        <p class="text-4xl font-bold text-indigo-600">85</p>
                        <p class="text-sm text-gray-500 mt-1">Dari 100 total produk</p>
                    </div>
                </div>
                <div class="mt-10 card p-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-5">Aktivitas Terbaru</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700 pb-3 border-b border-gray-100 last:border-b-0">
                            <span class="bg-green-500 w-3 h-3 rounded-full mr-4 flex-shrink-0"></span>
                            Pesanan <span class="font-semibold mx-1">#12345</span> diterima. <span class="ml-auto text-xs text-gray-400">1 jam lalu</span>
                        </li>
                        <li class="flex items-center text-gray-700 pb-3 border-b border-gray-100 last:border-b-0">
                            <span class="bg-blue-500 w-3 h-3 rounded-full mr-4 flex-shrink-0"></span>
                            Produk <span class="font-semibold mx-1">"Kemeja Batik"</span> ditambahkan. <span class="ml-auto text-xs text-gray-400">3 jam lalu</span>
                        </li>
                        <li class="flex items-center text-gray-700 pb-3 border-b border-gray-100 last:border-b-0">
                            <span class="bg-yellow-500 w-3 h-3 rounded-full mr-4 flex-shrink-0"></span>
                            Pesan baru dari <span class="font-semibold mx-1">Pelanggan A</span>. <span class="ml-auto text-xs text-gray-400">Kemarin</span>
                        </li>
                    </ul>
                </div>
            </section>

            <section id="profile" class="content-section">
                <h2 class="text-3xl font-semibold text-gray-800 mb-8">Profil Saya</h2>
                <div class="card p-8">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="shopName" class="block text-sm font-medium text-gray-700 mb-1">Nama Toko</label>
                                <input type="text" id="shopName" value="Toko Maju Jaya" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" value="penjual@example.com" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="tel" id="phone" value="081234567890" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Toko</label>
                            <textarea id="address" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">Jl. Merdeka No. 10, Jakarta</textarea>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="button" class="btn-primary px-8 py-3 font-semibold text-sm rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <section id="products" class="content-section">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-3xl font-semibold text-gray-800">Kelola Produk</h2>
                    <button id="addProductButton" class="btn-success px-6 py-3 font-semibold text-sm rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200 w-full sm:w-auto">
                        <i class="fas fa-plus mr-2"></i> Tambah Produk Baru
                    </button>
                </div>
                <div class="card table-wrapper overflow-x-auto">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">SKU</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kemeja Batik Pria</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">KMP-001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 150.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">50</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-active">Aktif</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                    <button class="text-indigo-600 hover:text-indigo-800 transition-colors edit-product"><i class="fas fa-edit mr-1"></i>Edit</button>
                                    <button class="text-red-600 hover:text-red-800 transition-colors delete-product"><i class="fas fa-trash-alt mr-1"></i>Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Celana Jeans Wanita</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">CJW-005</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 250.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-active">Aktif</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                    <button class="text-indigo-600 hover:text-indigo-800 transition-colors edit-product"><i class="fas fa-edit mr-1"></i>Edit</button>
                                    <button class="text-red-600 hover:text-red-800 transition-colors delete-product"><i class="fas fa-trash-alt mr-1"></i>Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sepatu Lari Anak</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SPA-012</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 120.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-out-of-stock">Habis</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                    <button class="text-indigo-600 hover:text-indigo-800 transition-colors edit-product"><i class="fas fa-edit mr-1"></i>Edit</button>
                                    <button class="text-red-600 hover:text-red-800 transition-colors delete-product"><i class="fas fa-trash-alt mr-1"></i>Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="orders" class="content-section">
                <h2 class="text-3xl font-semibold text-gray-800 mb-8">Kelola Pesanan</h2>
                <div class="card table-wrapper overflow-x-auto">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">ID Pesanan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Pelanggan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Total</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD1001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Budi Santoso</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-28</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 300.000</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-pending">Pending</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="px-4 py-2 bg-green-500 text-white text-xs rounded-lg hover:bg-green-600 transition-colors accept-order"><i class="fas fa-check mr-1"></i>Terima</button>
                                    <button class="px-4 py-2 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600 transition-colors reject-order"><i class="fas fa-times mr-1"></i>Tolak</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD1002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ani Lestari</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-27</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 150.000</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-processed">Diproses</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed" disabled><i class="fas fa-check mr-1"></i>Terima</button>
                                    <button class="px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed" disabled><i class="fas fa-times mr-1"></i>Tolak</button>
                                </td>
                            </tr>
                             <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD1003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Citra Dewi</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-29</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 550.000</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="status-badge status-pending">Pending</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="px-4 py-2 bg-green-500 text-white text-xs rounded-lg hover:bg-green-600 transition-colors accept-order"><i class="fas fa-check mr-1"></i>Terima</button>
                                    <button class="px-4 py-2 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600 transition-colors reject-order"><i class="fas fa-times mr-1"></i>Tolak</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="income" class="content-section">
                <h2 class="text-3xl font-semibold text-gray-800 mb-8">Kelola Pendapatan</h2>
                <div class="card p-8">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6">Grafik Pendapatan (7 Hari Terakhir)</h3>
                    <div class="w-full h-72 bg-gradient-to-br from-indigo-50 to-purple-50 p-6 rounded-xl flex items-end space-x-2 sm:space-x-4 shadow-inner">
                        <div class="bg-gradient-to-t from-indigo-500 to-indigo-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-indigo-600 hover:to-indigo-500" style="height: 60%; animation: rise 0.5s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-indigo-500 to-indigo-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-indigo-600 hover:to-indigo-500" style="height: 80%; animation: rise 0.7s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-purple-500 to-purple-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-purple-600 hover:to-purple-500" style="height: 50%; animation: rise 0.9s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-indigo-500 to-indigo-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-indigo-600 hover:to-indigo-500" style="height: 70%; animation: rise 1.1s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-purple-500 to-purple-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-purple-600 hover:to-purple-500" style="height: 90%; animation: rise 1.3s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-indigo-500 to-indigo-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-indigo-600 hover:to-indigo-500" style="height: 40%; animation: rise 1.5s ease-out forwards;"></div>
                        <div class="bg-gradient-to-t from-purple-500 to-purple-400 rounded-t-lg flex-1 transition-all duration-500 ease-out hover:from-purple-600 hover:to-purple-500" style="height: 75%; animation: rise 1.7s ease-out forwards;"></div>
                    </div>
                     @keyframes rise { from { height: 0%; } }
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-green-50 p-6 rounded-xl border border-green-200">
                            <i class="fas fa-wallet text-2xl text-green-600 mb-2"></i>
                            <p class="text-sm text-green-700 font-medium">Total Pendapatan Bulan Ini</p>
                            <p class="text-3xl font-bold text-green-600 mt-1">Rp 5.250.000</p>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                            <i class="fas fa-hourglass-half text-2xl text-blue-600 mb-2"></i>
                            <p class="text-sm text-blue-700 font-medium">Pendapatan Tertunda</p>
                            <p class="text-3xl font-bold text-blue-600 mt-1">Rp 1.200.000</p>
                        </div>
                        <div class="bg-gray-100 p-6 rounded-xl border border-gray-200">
                             <i class="fas fa-receipt text-2xl text-gray-600 mb-2"></i>
                            <p class="text-sm text-gray-700 font-medium">Penarikan Terakhir</p>
                            <p class="text-3xl font-bold text-gray-600 mt-1">Rp 3.000.000</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="chat" class="content-section">
                <h2 class="text-3xl font-semibold text-gray-800 mb-8">Chat dengan Pembeli</h2>
                <div class="card flex" style="height: calc(100vh - 14rem);">
                    <div class="w-1/3 border-r border-gray-200 overflow-y-auto">
                        <div class="p-4 border-b border-gray-200 sticky top-0 bg-white z-10">
                            <input type="text" placeholder="Cari percakapan..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm">
                        </div>
                        <ul class="divide-y divide-gray-100">
                            <li class="p-4 hover:bg-indigo-50 cursor-pointer transition-colors duration-150">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-semibold text-gray-700">Pelanggan A</h4>
                                    <span class="text-xs text-gray-400">10:30 AM</span>
                                </div>
                                <p class="text-sm text-gray-500 truncate mt-1">Halo, apakah produk ini masih ada?</p>
                            </li>
                            <li class="p-4 hover:bg-indigo-50 cursor-pointer bg-indigo-100 transition-colors duration-150">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-semibold text-indigo-700">Pelanggan B</h4>
                                    <span class="text-xs text-indigo-500">Kemarin</span>
                                </div>
                                <p class="text-sm text-indigo-600 truncate mt-1">Terima kasih atas bantuannya!</p>
                                <span class="mt-1 text-xs bg-red-500 text-white font-semibold rounded-full px-2.5 py-1 float-right">2</span>
                            </li>
                            <li class="p-4 hover:bg-indigo-50 cursor-pointer transition-colors duration-150">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-semibold text-gray-700">Pelanggan C</h4>
                                    <span class="text-xs text-gray-400">2 hari lalu</span>
                                </div>
                                <p class="text-sm text-gray-500 truncate mt-1">Saya ingin menanyakan detail pengiriman.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="w-2/3 flex flex-col bg-slate-50">
                        <div class="p-4 border-b border-gray-200 bg-white shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-800">Pelanggan B</h3>
                            <p class="text-xs text-green-500 font-medium"><i class="fas fa-circle text-xs mr-1"></i>Online</p>
                        </div>
                        <div class="flex-1 p-6 space-y-4 overflow-y-auto">
                            <div class="flex justify-start group">
                                <div class="bg-gray-200 text-gray-800 p-3 rounded-xl rounded-bl-none max-w-md shadow-sm">
                                    <p>Halo, saya mau tanya tentang produk XYZ.</p>
                                    <span class="text-xs text-gray-500 block text-right mt-1.5">10:25 AM</span>
                                </div>
                            </div>
                            <div class="flex justify-end group">
                                <div class="bg-indigo-600 text-white p-3 rounded-xl rounded-br-none max-w-md shadow-sm">
                                    <p>Halo! Tentu, produk XYZ ready stok. Ada yang bisa saya bantu?</p>
                                    <span class="text-xs text-indigo-200 block text-right mt-1.5">10:26 AM</span>
                                </div>
                            </div>
                             <div class="flex justify-start group">
                                <div class="bg-gray-200 text-gray-800 p-3 rounded-xl rounded-bl-none max-w-md shadow-sm">
                                    <p>Terima kasih atas bantuannya!</p>
                                    <span class="text-xs text-gray-500 block text-right mt-1.5">Kemarin</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-200 bg-white">
                            <div class="flex items-center space-x-3">
                                <input type="text" placeholder="Ketik pesan Anda..." class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm">
                                <button class="btn-primary p-3 rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="modalPlaceholder" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center p-4">
                <div class="modal-content-custom relative p-6 border w-full max-w-lg shadow-2xl rounded-xl bg-white">
                    <button id="modalCloseButton" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                    <div class="mt-3 text-center">
                        <div id="modalIcon" class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mb-5">
                            <i class="fas fa-info-circle fa-2x text-indigo-600"></i>
                        </div>
                        <h3 class="text-2xl leading-6 font-bold text-gray-900 mb-3" id="modalTitle">Judul Modal</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-md text-gray-600" id="modalMessage">Konten modal di sini...</p>
                        </div>
                        <div class="items-center px-4 py-3 mt-4 space-x-3">
                            <button id="modalConfirmButton" class="btn-primary px-6 py-2.5 text-base font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Konfirmasi
                            </button>
                            <button id="modalCancelButton" class="px-6 py-2.5 bg-gray-200 text-gray-800 text-base font-medium rounded-lg shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-colors">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="logoutModalTailwind" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center p-4">
                <div class="modal-content-custom relative p-6 border w-full max-w-md shadow-2xl rounded-xl bg-white">
                    <div class="flex justify-between items-center pb-3 mb-4 border-b">
                        <h3 class="text-xl font-semibold text-gray-900" id="logoutModalLabel">Konfirmasi Logout</h3>
                        <button id="closeLogoutModalTailwind" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times fa-lg"></i>
                        </button>
                    </div>
                    <div class="text-md text-gray-600 mb-6">
                        Apakah Anda yakin ingin keluar dari sesi ini?
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button id="cancelLogoutTailwind" type="button" class="px-6 py-2.5 bg-gray-200 text-gray-800 text-base font-medium rounded-lg shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-colors">
                            Batal
                        </button>
                        <button type="button" id="confirmLogoutTailwind" class="btn-danger px-6 py-2.5 text-base font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                            Ya, Logout
                        </button>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <form id="logoutForm" action="/logout" method="POST" class="hidden">
        </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            const contentSections = document.querySelectorAll('.content-section');
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const sidebar = document.getElementById('sidebar');

            function showContent(targetId) {
                contentSections.forEach(section => section.classList.remove('active'));
                sidebarItems.forEach(item => item.classList.remove('active'));

                const targetSection = document.getElementById(targetId);
                if (targetSection) targetSection.classList.add('active');

                const activeSidebarItem = document.querySelector(`.sidebar-item[data-target="${targetId}"]`);
                if (activeSidebarItem) activeSidebarItem.classList.add('active');
            }

            sidebarItems.forEach(item => {
                const target = item.dataset.target;
                if (target) {
                    item.addEventListener('click', (e) => {
                        e.preventDefault();
                        showContent(target);
                        if (window.innerWidth < 768) sidebar.classList.add('-translate-x-full');
                    });
                }
            });

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', () => sidebar.classList.toggle('-translate-x-full'));
            }

            document.addEventListener('click', (event) => {
                if (window.innerWidth < 768 && sidebar && mobileMenuButton && !sidebar.contains(event.target) && !mobileMenuButton.contains(event.target) && !sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            // Modal Umum
            const modalPlaceholder = document.getElementById('modalPlaceholder');
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');
            const modalIcon = document.getElementById('modalIcon');
            let modalConfirmButton = document.getElementById('modalConfirmButton');
            let modalCancelButton = document.getElementById('modalCancelButton');
            const modalCloseButton = document.getElementById('modalCloseButton');


            function openModal(title, message, onConfirm, iconClass = 'fa-info-circle text-indigo-600', confirmText = 'Konfirmasi', cancelText = 'Batal') {
                modalTitle.textContent = title;
                modalMessage.innerHTML = message;

                const iconElement = modalIcon.querySelector('i');
                if (iconElement) iconElement.className = `fas ${iconClass} fa-2x`;

                modalPlaceholder.classList.remove('hidden');

                const newConfirmButton = modalConfirmButton.cloneNode(true);
                newConfirmButton.textContent = confirmText;
                modalConfirmButton.parentNode.replaceChild(newConfirmButton, modalConfirmButton);
                modalConfirmButton = newConfirmButton;
                modalConfirmButton.onclick = () => {
                    if (onConfirm) onConfirm();
                    closeModal();
                };

                const newCancelButton = modalCancelButton.cloneNode(true);
                newCancelButton.textContent = cancelText;
                modalCancelButton.parentNode.replaceChild(newCancelButton, modalCancelButton);
                modalCancelButton = newCancelButton;
                modalCancelButton.onclick = closeModal;

                if(modalCloseButton) modalCloseButton.onclick = closeModal;
            }

            function closeModal() {
                modalPlaceholder.classList.add('hidden');
            }

            // Logika untuk Modal Logout Spesifik (Tailwind Styled)
            const logoutButton = document.getElementById('logoutButton');
            const logoutModalTailwind = document.getElementById('logoutModalTailwind');
            const closeLogoutModalTailwind = document.getElementById('closeLogoutModalTailwind');
            const cancelLogoutTailwind = document.getElementById('cancelLogoutTailwind');
            const confirmLogoutTailwind = document.getElementById('confirmLogoutTailwind');
            const logoutForm = document.getElementById('logoutForm');

            if (logoutButton) {
                logoutButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (logoutModalTailwind) {
                        logoutModalTailwind.classList.remove('hidden');
                    }
                });
            }

            if (closeLogoutModalTailwind) {
                closeLogoutModalTailwind.addEventListener('click', () => {
                    if (logoutModalTailwind) logoutModalTailwind.classList.add('hidden');
                });
            }
            if (cancelLogoutTailwind) {
                cancelLogoutTailwind.addEventListener('click', () => {
                    if (logoutModalTailwind) logoutModalTailwind.classList.add('hidden');
                });
            }
            if (confirmLogoutTailwind) {
                confirmLogoutTailwind.addEventListener('click', () => {
                    if (logoutForm) {
                        console.log('Logout form akan disubmit. Action:', logoutForm.action);
                        // Penting: Pastikan form ini memiliki CSRF token jika dijalankan di Laravel.
                        // Jika Anda menggunakan Blade, direktif @csrf akan menanganinya.
                        logoutForm.submit();
                    }
                });
            }
            // Menutup modal jika klik di luar area modal
            if (logoutModalTailwind) {
                logoutModalTailwind.addEventListener('click', function(event) {
                    if (event.target === logoutModalTailwind) {
                        logoutModalTailwind.classList.add('hidden');
                    }
                });
            }


            // Placeholder actions untuk tombol lain (menggunakan modal umum)
            const addProductButton = document.getElementById('addProductButton');
            if (addProductButton) {
                addProductButton.addEventListener('click', () => {
                    openModal(
                        'Tambah Produk Baru',
                        'Formulir untuk menambah produk akan muncul di sini. <br/> Ini adalah placeholder untuk fungsionalitas penuh.',
                        () => console.log('Konfirmasi Tambah Produk'),
                        'fa-plus-circle text-green-600'
                    );
                });
            }

            document.querySelectorAll('.edit-product').forEach(button => {
                button.addEventListener('click', () => {
                    openModal(
                        'Edit Produk',
                        'Formulir untuk mengedit produk ini akan muncul di sini. <br/> Ini adalah placeholder.',
                        () => console.log('Konfirmasi Edit Produk'),
                        'fa-edit text-blue-600'
                    );
                });
            });

            document.querySelectorAll('.delete-product').forEach(button => {
                button.addEventListener('click', () => {
                    openModal(
                        'Hapus Produk',
                        'Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat diurungkan.',
                        () => {
                            console.log('Konfirmasi Hapus Produk');
                            button.closest('tr').remove();
                        },
                        'fa-trash-alt text-red-600',
                        'Ya, Hapus',
                        'Tidak, Batalkan'
                    );
                });
            });

            document.querySelectorAll('.accept-order').forEach(button => {
                button.addEventListener('click', () => {
                    openModal(
                        'Terima Pesanan',
                        'Apakah Anda yakin ingin menerima pesanan ini?',
                        () => {
                            console.log('Konfirmasi Terima Pesanan');
                            const statusCell = button.closest('tr').querySelector('td:nth-child(5) span');
                            if(statusCell) {
                                statusCell.textContent = 'Diproses';
                                statusCell.className = 'status-badge status-processed';
                            }
                            button.disabled = true;
                            button.className = 'px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed';
                            const rejectBtn = button.parentElement.querySelector('.reject-order');
                            if(rejectBtn) {
                                rejectBtn.disabled = true;
                                rejectBtn.className = 'px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed';
                            }
                        },
                        'fa-check-circle text-green-600',
                        'Ya, Terima',
                        'Batal'
                    );
                });
            });

            document.querySelectorAll('.reject-order').forEach(button => {
                button.addEventListener('click', () => {
                    openModal(
                        'Tolak Pesanan',
                        'Apakah Anda yakin ingin menolak pesanan ini?',
                        () => {
                            console.log('Konfirmasi Tolak Pesanan');
                            const statusCell = button.closest('tr').querySelector('td:nth-child(5) span');
                            if(statusCell) {
                                statusCell.textContent = 'Ditolak';
                                statusCell.className = 'status-badge status-rejected';
                            }
                            button.disabled = true;
                            button.className = 'px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed';
                            const acceptBtn = button.parentElement.querySelector('.accept-order');
                            if(acceptBtn) {
                                acceptBtn.disabled = true;
                                acceptBtn.className = 'px-4 py-2 bg-gray-300 text-gray-700 text-xs rounded-lg cursor-not-allowed';
                            }
                        },
                        'fa-times-circle text-red-600',
                        'Ya, Tolak',
                        'Batal'
                    );
                });
            });

            showContent('dashboard');
        });
    </script>
</body>
</html>
