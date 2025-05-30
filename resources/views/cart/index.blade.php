<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(135deg, #f6f9fc 0%, #e9eef3 100%);
            color: #374151; /* gray-700 */
        }
        .cart-card {
            animation: fadeInCard 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px) scale(0.98);
        }
        @keyframes fadeInCard {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #c7d2fe; /* indigo-200 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a5b4fc; /* indigo-300 */
        }
        .quantity-input {
            width: 50px; /* Adjust as needed */
            text-align: center;
        }
    </style>
</head>
<body class="min-h-screen p-4 sm:p-6 md:p-8">

    <div class="cart-card bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 sm:mb-8 gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Keranjang Belanja Anda</h1>
                <p class="text-gray-500 mt-1">Periksa item Anda dan lanjutkan ke pembayaran.</p>
            </div>
            <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2.5 border border-indigo-600 text-indigo-600 rounded-lg shadow-sm text-sm font-medium hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors whitespace-nowrap">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>

        @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="w-full min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="p-3 sm:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-12">
                                <input type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </th>
                            <th scope="col" class="p-3 sm:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                            <th scope="col" class="p-3 sm:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th scope="col" class="p-3 sm:p-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="p-3 sm:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                            <th scope="col" class="p-3 sm:p-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                            @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="p-3 sm:p-4 whitespace-nowrap">
                                    <input type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                </td>
                                <td class="p-3 sm:p-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $item['image'] ?? asset('assets/img/default.png') }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                                            {{-- <div class="text-xs text-gray-500">Kategori Produk</div> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3 sm:p-4 whitespace-nowrap text-sm text-gray-600">Rp {{ number_format($item['price']) }}</td>
                                <td class="p-3 sm:p-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500" type="button">
                                            <i class="fas fa-minus fa-xs"></i>
                                        </button>
                                        <input type="number" value="{{ $item['quantity'] }}" class="quantity-input border border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500 p-1.5">
                                        <button class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500" type="button">
                                            <i class="fas fa-plus fa-xs"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="p-3 sm:p-4 whitespace-nowrap text-sm font-semibold text-gray-700">Rp {{ number_format($subtotal) }}</td>
                                <td class="p-3 sm:p-4 whitespace-nowrap text-center">
                                    <button class="text-red-500 hover:text-red-700 transition-colors focus:outline-none" title="Hapus item">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 sm:mt-8 border-t border-gray-200 pt-6 sm:pt-8">
                <div class="flex flex-col sm:flex-row justify-end items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <div class="text-lg">
                        <span class="font-medium text-gray-600">Total Belanja:</span>
                        <span class="font-bold text-2xl text-indigo-700 ml-2">Rp {{ number_format($total) }}</span>
                    </div>
                    <button class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-transform transform hover:scale-105" onclick="window.location='{{ route('cart.checkout') }}'">
                        Lanjut ke Checkout <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

        @else
            <div class="text-center py-12">
                <i class="fas fa-shopping-cart fa-4x text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Keranjang Anda Kosong</h3>
                <p class="text-gray-500 mb-6">Sepertinya Anda belum menambahkan produk apapun ke keranjang.</p>
                <a href="{{ url('/') }}" class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Mulai Belanja Sekarang
                </a>
            </div>
        @endif
    </div>
</body>
</html>
