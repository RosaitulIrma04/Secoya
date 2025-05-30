<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(135deg, #f6f9fc 0%, #e9eef3 100%);
            color: #333;
        }
        .profile-card {
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
        input, textarea, select {
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .alert-tailwind {
            padding: 1rem; /* p-4 */
            margin-bottom: 1.5rem; /* mb-6 */
            border-radius: 0.5rem; /* rounded-lg */
            font-size: 0.875rem; /* text-sm */
        }
        .alert-success-tailwind {
            background-color: #dcfce7; /* green-100 */
            border-left-width: 4px;
            border-color: #22c55e; /* green-500 */
            color: #15803d; /* green-700 */
        }
        .alert-danger-tailwind {
            background-color: #fee2e2; /* red-100 */
            border-left-width: 4px;
            border-color: #ef4444; /* red-500 */
            color: #b91c1c; /* red-700 */
        }
        .alert-danger-tailwind ul {
            margin-bottom: 0;
            list-style-position: inside;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-4 py-8">

    @if(session('success'))
        <div class="alert-tailwind alert-success-tailwind w-full max-w-lg mx-auto">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert-tailwind alert-danger-tailwind w-full max-w-lg mx-auto">
            <ul class="space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="profile-card bg-white p-8 md:p-10 rounded-xl shadow-2xl w-full max-w-lg">
        <div class="text-center mb-8">
            <i class="fas fa-user-edit fa-3x text-indigo-600 mb-3"></i>
            <h1 class="text-2xl font-bold text-gray-800">Profil Akun Anda</h1>
            <p class="text-gray-500 mt-1">Perbarui informasi profil Anda di bawah ini.</p>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('POST') {{-- Atau PATCH jika route Anda menggunakan PATCH --}}

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-user text-gray-400"></i>
                    </span>
                    <input type="text" name="name" id="name" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ Auth::user()->name }}" required>
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </span>
                    <input type="email" name="email" id="email" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ Auth::user()->email }}" required>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-xs text-gray-500">(Kosongkan jika tidak ingin mengubah)</span></label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <input type="password" name="password" id="password" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password baru">
                </div>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-phone text-gray-400"></i>
                    </span>
                    <input type="text" name="phone" id="phone" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ Auth::user()->phone ?? '' }}" placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="address" id="address" class="block w-full pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="3" placeholder="Masukkan alamat lengkap Anda">{{ Auth::user()->address ?? '' }}</textarea>
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="gender" id="gender" class="block w-full pr-3 py-2.5 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ (Auth::user()->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (Auth::user()->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label for="joined_at" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Bergabung</label>
                <input type="text" id="joined_at" class="block w-full pr-3 py-2.5 border border-gray-200 bg-gray-100 rounded-lg shadow-sm sm:text-sm text-gray-500" value="{{ Auth::user()->created_at->format('d F Y') }}" readonly>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between pt-4 space-y-3 sm:space-y-0 sm:space-x-3">
                <a href="{{ route('pembeli.index') }}" class="w-full sm:w-auto flex items-center justify-center px-6 py-2.5 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <div class="w-full sm:w-auto flex space-x-3">
                    <button type="reset" class="w-full sm:w-auto flex-1 sm:flex-initial justify-center px-6 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors">
                        Reset
                    </button>
                    <button type="submit" class="w-full sm:w-auto flex-1 sm:flex-initial justify-center px-6 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-transform transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Profil
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
