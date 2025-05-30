<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name', 'MarketPro E-commerce') }}</title>
    {{-- Opsional: Jika Anda menggunakan Font Awesome untuk ikon --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> --}}

    <style>
        /* Import Font (Opsional, contoh menggunakan Google Fonts) */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body.admin-login-page {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5; /* Warna latar belakang halaman */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .admin-login-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px; /* Lebar maksimum form */
            text-align: center;
        }

        .admin-login-form h2 {
            color: #1e3a8a; /* Warna primary-blue dari CSS Anda sebelumnya */
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 700;
        }

        .admin-login-form .form-group {
            margin-bottom: 20px;
            text-align: left; /* Label dan input rata kiri */
        }

        .admin-login-form .form-group label {
            display: block;
            color: #495057;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .admin-login-form input[type="email"],
        .admin-login-form input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 16px;
            color: #495057;
            background-color: #f8f9fa; /* Latar input sedikit berbeda */
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-sizing: border-box; /* Pastikan padding dan border masuk dalam width */
        }

        .admin-login-form input[type="email"]::placeholder,
        .admin-login-form input[type="password"]::placeholder {
            color: #adb5bd;
            font-size: 15px;
        }

        .admin-login-form input[type="email"]:focus,
        .admin-login-form input[type="password"]:focus {
            border-color: #1e3a8a; /* Warna primary-blue saat focus */
            box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25); /* Shadow saat focus */
            outline: none;
            background-color: #fff;
        }

        .admin-login-form .btn-login {
            width: 100%;
            padding: 12px 15px;
            background-color: #1e3a8a; /* Warna primary-blue */
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-login-form .btn-login:hover {
            background-color: #1e40af; /* Warna dark-blue dari CSS Anda sebelumnya */
        }

        .admin-login-form .btn-login:active {
            transform: scale(0.98); /* Efek sedikit mengecil saat diklik */
        }

        /* Styling untuk pesan error (jika Anda menggunakan validasi Laravel) */
        .admin-login-form .alert.alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: left;
            font-size: 14px;
        }

        .admin-login-form .alert.alert-danger ul {
            margin: 0;
            padding-left: 20px; /* Agar list error sedikit menjorok */
        }
    </style>
</head>
<body class="admin-login-page">

    <div class="admin-login-container">
        <form method="POST" action="{{ route('admin.login') }}" class="admin-login-form">
            @csrf
            <h2>Admin Login</h2>

            {{-- Menampilkan error validasi Laravel --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Menampilkan error spesifik dari session (misalnya, kredensial salah) --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status')) {{-- Untuk pesan sukses seperti setelah reset password --}}
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="form-group">
                <label for="email">Email Admin</label>
                <input type="email" id="email" name="email" placeholder="contoh@domain.com" required value="{{ old('email') }}" autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            {{-- Opsional: Tambahkan "Remember Me" jika diinginkan --}}
            {{--
            <div class="form-group" style="text-align: left; display: flex; align-items: center;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width: auto; margin-right: 8px;">
                <label for="remember" style="margin-bottom: 0; font-size: 14px; color: #495057;">
                    Ingat Saya
                </label>
            </div>
            --}}

            <button type="submit" class="btn-login">Login</button>

            {{-- Opsional: Link "Lupa Password?" --}}
            {{--
            @if (Route::has('admin.password.request')) // Ganti dengan nama route Anda jika ada
                <div style="margin-top: 15px; font-size: 14px;">
                    <a href="{{ route('admin.password.request') }}" style="color: #1e3a8a; text-decoration: none;">
                        Lupa Password Anda?
                    </a>
                </div>
            @endif
            --}}
        </form>
    </div>

</body>
</html>
