<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual - Akses Akun</title>
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

        .form-container {
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out, max-height 0.5s ease-in-out;
        }
        .form-hidden {
            opacity: 0;
            transform: translateY(20px) scale(0.98);
            max-height: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .form-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            max-height: 1000px; /* Sesuaikan jika perlu */
        }
        .tab-button {
            transition: all 0.3s ease-in-out;
        }
        .tab-button.active {
            border-color: #4f46e5; /* indigo-600 */
            color: #4f46e5;
            background-color: #eef2ff; /* indigo-50 */
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .tab-button:not(.active):hover {
            background-color: #f9fafb; /* gray-50 */
        }

        input[type="email"], input[type="password"], input[type="text"] {
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus {
            transform: translateY(-1px);
        }

        button[type="submit"] {
            transition: all 0.25s ease-in-out;
        }
        button[type="submit"]:active {
            transform: scale(0.98) translateY(1px);
            filter: brightness(0.95);
        }

        /* Animasi untuk ikon toko DIHAPUS */
        /* .store-icon-animated {
            animation: pulseIcon 2.5s infinite ease-in-out;
        }
        @keyframes pulseIcon {
            0%, 100% {
                transform: scale(1);
                filter: drop-shadow(0 0 3px rgba(79, 70, 229, 0.3));
            }
            50% {
                transform: scale(1.1);
                filter: drop-shadow(0 0 8px rgba(79, 70, 229, 0.5));
            }
        }
        .store-icon-animated:hover {
            animation-play-state: paused;
            transform: scale(1.15);
        } */

    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <div class="auth-card bg-white p-8 md:p-12 rounded-xl shadow-2xl w-full max-w-lg">
        <div class="text-center mb-8">
            <i class="fas fa-store-alt fa-3x text-indigo-600 mb-3"></i>
            <h1 class="text-3xl font-bold text-gray-800">Akun Penjual</h1>
            <p class="text-gray-500 mt-2">Masuk atau buat akun baru untuk mulai berjualan.</p>
        </div>

        <div class="flex border-b border-gray-200 mb-8">
            <button id="loginTabButton" class="tab-button flex-1 py-3 px-4 text-center font-semibold text-gray-600 hover:text-indigo-600 border-b-2 border-transparent focus:outline-none active">
                Login
            </button>
            <button id="registerTabButton" class="tab-button flex-1 py-3 px-4 text-center font-semibold text-gray-600 hover:text-indigo-600 border-b-2 border-transparent focus:outline-none">
                Daftar
            </button>
        </div>

        <div id="loginFormContainer" class="form-container form-visible">
            <form method="POST" action="{{ route('login.penjual.submit') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="login_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input type="email" id="login_email" name="email" required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="anda@domain.com">
                    </div>
                </div>

                <div>
                    <label for="login_password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input type="password" id="login_password" name="password" required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me_login" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me_login" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lupa kata sandi?</a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-transform transform hover:scale-105">
                        Login
                    </button>
                </div>
            </form>
        </div>

        <div id="registerFormContainer" class="form-container form-hidden">
            <form method="POST" action="{{ route('register.penjual') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="register_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                     <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input type="text" id="register_name" name="name" required autofocus
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="Nama Lengkap Anda">
                    </div>
                </div>

                <div>
                    <label for="register_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input type="email" id="register_email" name="email" required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="anda@domain.com">
                    </div>
                </div>

                <div>
                    <label for="register_password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input type="password" id="register_password" name="password" required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="Minimal 8 karakter">
                    </div>
                </div>

                <div>
                    <label for="register_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-check-circle text-gray-400"></i>
                        </span>
                        <input type="password" id="register_password_confirmation" name="password_confirmation" required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="Ulangi kata sandi">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-transform transform hover:scale-105">
                        Daftar Akun Baru
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600" id="formToggleText">
                Belum punya akun? <a href="#" id="switchToRegisterLink" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar sekarang</a>
            </p>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginTabButton = document.getElementById('loginTabButton');
            const registerTabButton = document.getElementById('registerTabButton');
            const loginFormContainer = document.getElementById('loginFormContainer');
            const registerFormContainer = document.getElementById('registerFormContainer');
            const formToggleText = document.getElementById('formToggleText');

            function showLoginForm() {
                loginFormContainer.classList.remove('form-hidden');
                loginFormContainer.classList.add('form-visible');
                registerFormContainer.classList.add('form-hidden');
                registerFormContainer.classList.remove('form-visible');

                loginTabButton.classList.add('active');
                registerTabButton.classList.remove('active');

                formToggleText.innerHTML = 'Belum punya akun? <a href="#" id="switchToRegisterLinkDynamic" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar sekarang</a>';
                document.getElementById('switchToRegisterLinkDynamic').addEventListener('click', function(e) {
                    e.preventDefault();
                    showRegisterForm();
                });
            }

            function showRegisterForm() {
                registerFormContainer.classList.remove('form-hidden');
                registerFormContainer.classList.add('form-visible');
                loginFormContainer.classList.add('form-hidden');
                loginFormContainer.classList.remove('form-visible');

                registerTabButton.classList.add('active');
                loginTabButton.classList.remove('active');

                formToggleText.innerHTML = 'Sudah punya akun? <a href="#" id="switchToLoginLinkDynamic" class="font-medium text-indigo-600 hover:text-indigo-500">Login di sini</a>';
                document.getElementById('switchToLoginLinkDynamic').addEventListener('click', function(e) {
                    e.preventDefault();
                    showLoginForm();
                });
            }

            loginTabButton.addEventListener('click', function(e) {
                e.preventDefault();
                showLoginForm();
            });

            registerTabButton.addEventListener('click', function(e) {
                e.preventDefault();
                showRegisterForm();
            });

            const initialSwitchToRegisterLink = document.getElementById('switchToRegisterLink');
             if (initialSwitchToRegisterLink) {
                initialSwitchToRegisterLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    showRegisterForm();
                });
            }
        });
    </script>

</body>
</html>
