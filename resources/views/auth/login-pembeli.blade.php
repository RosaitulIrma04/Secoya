<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login atau Daftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
            color: #333;
        }

        .auth-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .auth-tabs {
            display: flex;
            margin-bottom: 25px;
            border-bottom: 1px solid #ddd;
        }

        .auth-tab-button {
            flex-grow: 1;
            padding: 10px 15px;
            cursor: pointer;
            text-align: center;
            background-color: transparent;
            border: none;
            font-size: 16px;
            font-weight: bold;
            color: #666;
            position: relative; /* Untuk garis bawah aktif */
        }

        .auth-tab-button.active {
            color: #007bff;
        }
        .auth-tab-button.active::after { /* Garis bawah untuk tab aktif */
            content: '';
            position: absolute;
            bottom: -1px; /* Tepat di atas border-bottom container tabs */
            left: 0;
            right: 0;
            height: 2px;
            background-color: #007bff;
        }


        .auth-form-content {
            display: none; /* Sembunyikan semua form content by default */
        }

        .auth-form-content.active {
            display: block; /* Tampilkan hanya form content yang aktif */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .btn-submit-login { /* Tombol login */
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit-login:hover {
            background-color: #0056b3;
        }

        .btn-submit-register { /* Tombol register */
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit-register:hover {
            background-color: #218838;
        }

        .alert {
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            display: block;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-tabs">
            <button class="auth-tab-button active" onclick="showForm('login')">Login</button>
            <button class="auth-tab-button" onclick="showForm('register')">Daftar</button>
        </div>

        {{-- FORM LOGIN --}}
        <div id="login-form" class="auth-form-content active">
            <h2>Login Pembeli</h2>
            @if (session('error') && (old('form_type') == 'login' || !old('form_type') && !($errors->has('name') || $errors->has('password_confirmation')) ) )
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any() && (old('form_type') == 'login' || !old('form_type') && !($errors->has('name') || $errors->has('password_confirmation')) ) && !session('error'))
                <div class="alert alert-danger">
                    Terjadi kesalahan pada input login.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="form_type" value="login"> {{-- Penanda form --}}

                <div class="form-group">
                    <label for="login_email">Alamat Email</label>
                    <input id="login_email" type="email" class="form-control @error('email', 'login') is-invalid @enderror" name="email" value="{{ old('form_type') == 'login' ? old('email') : '' }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda">
                    @error('email', 'login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="login_password">Password</label>
                    <input id="login_password" type="password" class="form-control @error('password', 'login') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda">
                    @error('password', 'login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit-login">
                        Login
                    </button>
                </div>
            </form>
        </div>

        {{-- FORM REGISTRASI --}}
        <div id="register-form" class="auth-form-content">
            <h2>Buat Akun Baru</h2>
            @if ($errors->any() && old('form_type') == 'register')
                 <div class="alert alert-danger">
                    Terjadi kesalahan pada input registrasi.
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}"> {{-- Sesuaikan nama rute jika berbeda --}}
                @csrf
                <input type="hidden" name="form_type" value="register"> {{-- Penanda form --}}

                <div class="form-group">
                    <label for="register_name">Nama Lengkap</label>
                    <input id="register_name" type="text" class="form-control @error('name', 'register') is-invalid @enderror" name="name" value="{{ old('form_type') == 'register' ? old('name') : '' }}" required autocomplete="name" placeholder="Masukkan nama lengkap Anda">
                    @error('name', 'register')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="register_email">Alamat Email</label>
                    <input id="register_email" type="email" class="form-control @error('email', 'register') is-invalid @enderror" name="email" value="{{ old('form_type') == 'register' ? old('email') : '' }}" required autocomplete="email" placeholder="Masukkan email Anda">
                    @error('email', 'register') {{-- Menggunakan error bag 'register' --}}
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="register_password">Password</label>
                    <input id="register_password" type="password" class="form-control @error('password', 'register') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Buat password (min. 6 karakter)">
                    @error('password', 'register')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="register_password_confirmation">Konfirmasi Password</label>
                    <input id="register_password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ketik ulang password Anda">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit-register">
                        Daftar Akun
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showForm(formName) {
            // Sembunyikan semua form content
            document.querySelectorAll('.auth-form-content').forEach(function(form) {
                form.classList.remove('active');
            });
            // Sembunyikan semua tab button active state
            document.querySelectorAll('.auth-tab-button').forEach(function(button) {
                button.classList.remove('active');
            });

            // Tampilkan form dan tab yang dipilih
            document.getElementById(formName + '-form').classList.add('active');
            event.currentTarget.classList.add('active'); // Menambahkan class active ke tombol yang diklik
        }

        // Logika untuk menentukan tab aktif berdasarkan error atau parameter URL
        document.addEventListener('DOMContentLoaded', function() {
            let defaultForm = 'login'; // Default ke login

            // Cek apakah ada error spesifik dari registrasi untuk mengaktifkan tab registrasi
            @if ($errors->hasBag('register') || ($errors->any() && old('form_type') === 'register'))
                defaultForm = 'register';
            @elseif ($errors->any() && old('form_type') === 'login')
                defaultForm = 'login';
            @endif

            // Cek parameter URL (misalnya /auth?form=register)
            const urlParams = new URLSearchParams(window.location.search);
            const formParam = urlParams.get('form');
            if (formParam === 'register' || formParam === 'login') {
                defaultForm = formParam;
            }

            // Cek fragment URL (misalnya /auth#register)
            const hash = window.location.hash.substring(1); // Menghilangkan '#'
            if (hash === 'register' || hash === 'login') {
                defaultForm = hash;
            }


            // Tampilkan form default dan set tombol tab yang sesuai
            document.getElementById(defaultForm + '-form').classList.add('active');
            document.querySelector('.auth-tab-button[onclick="showForm(\'' + defaultForm + '\')"]').classList.add('active');

            // Jika ada error, pastikan tab yang salah tetap aktif
            @if ($errors->any())
                const formTypeWithError = '{{ old("form_type") }}';
                if (formTypeWithError) {
                    // Hapus 'active' dari default jika berbeda dan set yang benar
                    document.querySelectorAll('.auth-form-content').forEach(form => form.classList.remove('active'));
                    document.querySelectorAll('.auth-tab-button').forEach(button => button.classList.remove('active'));

                    document.getElementById(formTypeWithError + '-form').classList.add('active');
                    document.querySelector('.auth-tab-button[onclick="showForm(\'' + formTypeWithError + '\')"]').classList.add('active');
                }
            @endif
        });
    </script>
</body>
</html>
