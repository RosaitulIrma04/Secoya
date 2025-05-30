<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login atau Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(135deg, #f6f9fc 0%, #e9eef3 100%);
        }
        .auth-card {
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

        .auth-form-content {
            display: none; /* Sembunyikan semua form content by default */
            animation: fadeInFormContent 0.5s ease-out;
        }
        .auth-form-content.active {
            display: block; /* Tampilkan hanya form content yang aktif */
        }
        @keyframes fadeInFormContent {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .tab-button {
            transition: all 0.3s ease-in-out;
        }
        .tab-button.active {
            border-color: #4f46e5; /* indigo-600 */
            color: #4f46e5;
            background-color: #eef2ff; /* indigo-50 */
        }
        .tab-button:not(.active):hover {
            background-color: #f9fafb; /* gray-50 */
        }

        input[type="email"], input[type="password"], input[type="text"] {
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .alert-danger-tailwind {
            background-color: #fee2e2; /* red-100 */
            border-left-width: 4px;
            border-color: #ef4444; /* red-500 */
            color: #b91c1c; /* red-700 */
            padding: 1rem; /* p-4 */
            margin-bottom: 1.5rem; /* mb-6 */
            border-radius: 0.375rem; /* rounded-md */
        }
        .invalid-feedback-tailwind {
            color: #ef4444; /* red-500 */
            font-size: 0.875rem; /* text-sm */
            margin-top: 0.25rem; /* mt-1 */
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <div class="auth-card bg-white p-8 md:p-10 rounded-xl shadow-2xl w-full max-w-md">
        <div class="text-center mb-8">
            <i class="fas fa-users fa-3x text-indigo-600 mb-3"></i>
            <h1 class="text-2xl font-bold text-gray-800">Akses Akun Anda</h1>
            <p class="text-gray-500 mt-1">Silakan login atau buat akun baru.</p>
        </div>

        <div class="flex border-b border-gray-200 mb-6">
            <button id="loginTabButton" class="tab-button flex-1 py-3 px-4 text-center font-semibold text-gray-600 hover:text-indigo-600 border-b-2 border-transparent focus:outline-none">
                Login
            </button>
            <button id="registerTabButton" class="tab-button flex-1 py-3 px-4 text-center font-semibold text-gray-600 hover:text-indigo-600 border-b-2 border-transparent focus:outline-none">
                Daftar
            </button>
        </div>

        <!-- {{-- FORM LOGIN --}} -->
        <div id="login-form" class="auth-form-content">
            <h2 class="text-xl font-semibold text-gray-700 mb-6 text-center">Login Akun</h2>

            @if (session('error') && (old('form_type') == 'login' || !old('form_type') && !($errors->has('name') || $errors->has('password_confirmation')) ) )
                <div class="alert-danger-tailwind" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any() && (old('form_type') == 'login' || !old('form_type') && !($errors->has('name') || $errors->has('password_confirmation')) ) && !session('error'))
                <div class="alert-danger-tailwind" role="alert">
                    Terjadi kesalahan pada input login. Silakan periksa kembali.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="form_type" value="login">

                <div>
                    <label for="login_email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input id="login_email" type="email" name="email" value="{{ old('form_type') == 'login' ? old('email') : '' }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda"
                               class="block w-full pl-10 pr-3 py-2.5 border @error('email', 'login') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('email', 'login')
                        <p class="invalid-feedback-tailwind" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="login_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input id="login_password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda"
                               class="block w-full pl-10 pr-3 py-2.5 border @error('password', 'login') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('password', 'login')
                        <p class="invalid-feedback-tailwind" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input id="remember_me_login_tailwind" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me_login_tailwind" class="ml-2 block text-gray-900">Ingat saya</label>
                    </div>
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lupa kata sandi?</a>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-transform transform hover:scale-105">
                        Login
                    </button>
                </div>
            </form>
        </div>

        {{-- FORM REGISTRASI --}}
        <div id="register-form" class="auth-form-content">
            <h2 class="text-xl font-semibold text-gray-700 mb-6 text-center">Buat Akun Baru</h2>

            @if ($errors->any() && old('form_type') == 'register')
                <div class="alert-danger-tailwind" role="alert">
                     Terjadi kesalahan pada input registrasi. Silakan periksa kembali.
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="form_type" value="register">

                <div>
                    <label for="register_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input id="register_name" type="text" name="name" value="{{ old('form_type') == 'register' ? old('name') : '' }}" required autocomplete="name" placeholder="Masukkan nama lengkap Anda"
                               class="block w-full pl-10 pr-3 py-2.5 border @error('name', 'register') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('name', 'register')
                        <p class="invalid-feedback-tailwind" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input id="register_email" type="email" name="email" value="{{ old('form_type') == 'register' ? old('email') : '' }}" required autocomplete="email" placeholder="Masukkan email Anda"
                               class="block w-full pl-10 pr-3 py-2.5 border @error('email', 'register') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('email', 'register')
                        <p class="invalid-feedback-tailwind" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input id="register_password" type="password" name="password" required autocomplete="new-password" placeholder="Buat password (min. 6 karakter)"
                               class="block w-full pl-10 pr-3 py-2.5 border @error('password', 'register') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                     @error('password', 'register')
                        <p class="invalid-feedback-tailwind" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <div class="relative">
                         <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-check-circle text-gray-400"></i>
                        </span>
                        <input id="register_password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ketik ulang password Anda"
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="pt-1">
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-transform transform hover:scale-105">
                        Daftar Akun
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginTabButton = document.getElementById('loginTabButton');
            const registerTabButton = document.getElementById('registerTabButton');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            function showForm(formToShow, tabToActivate) {
                if (formToShow === 'login') {
                    loginForm.classList.add('active');
                    registerForm.classList.remove('active');
                    loginTabButton.classList.add('active');
                    registerTabButton.classList.remove('active');
                } else {
                    registerForm.classList.add('active');
                    loginForm.classList.remove('active');
                    registerTabButton.classList.add('active');
                    loginTabButton.classList.remove('active');
                }
            }

            loginTabButton.addEventListener('click', function(event) {
                event.preventDefault();
                showForm('login', this);
            });

            registerTabButton.addEventListener('click', function(event) {
                event.preventDefault();
                showForm('register', this);
            });

            // --- Logika untuk menentukan form default berdasarkan error atau parameter URL ---
            // Blade akan mengevaluasi kondisi ini di server dan mencetak string 'register' atau 'login'.
            let serverDeterminedForm = `{{
                ($errors->hasBag('register') || ($errors->any() && old('form_type') === 'register'))
                ? 'register'
                : ((($errors->any() && old('form_type') === 'login') || session('error'))
                    ? 'login'
                    : 'login')
            }}`;

            // Inisialisasi defaultForm dengan nilai dari server, atau 'login' jika tidak valid
            let defaultForm = (serverDeterminedForm === 'register' || serverDeterminedForm === 'login') ? serverDeterminedForm : 'login';

            // Override dengan parameter URL jika ada
            const urlParams = new URLSearchParams(window.location.search);
            const formParam = urlParams.get('form');
            if (formParam === 'register' || formParam === 'login') {
                defaultForm = formParam;
            }

            // Override dengan fragment URL jika ada (prioritas lebih tinggi dari param URL)
            const hash = window.location.hash.substring(1);
            if (hash === 'register' || hash === 'login') {
                defaultForm = hash;
            }

            // Tampilkan form default dan set tombol tab yang sesuai
            if (defaultForm === 'register') {
                showForm('register', registerTabButton);
            } else {
                showForm('login', loginTabButton); // Default akhir adalah login
            }
        });
    </script>
</body>
</html>
