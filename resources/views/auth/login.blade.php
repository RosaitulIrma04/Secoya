<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    {{-- Alert messages --}}
        @if(session('success'))
        <div class="custom-alert success">
            <span>{{ session('success') }}</span>
            <span class="close-alert" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        @endif
        @if(session('error'))
        <div class="custom-alert error">
            <span>{{ session('error') }}</span>
            <span class="close-alert" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        @endif
        @if($errors->any())
        <div class="custom-alert error">
            <span>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </span>
            <span class="close-alert" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        @endif

    <div class="container">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center" id="login-form">
            <h2>Please Sign In</h2>
            <!-- Untuk LOGIN -->
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="button-row">
                    <button type="button" class="btn-row" onclick="window.location='{{ url('/') }}'">Back</button>
                    <button type="submit" class="btn-row">Login</button>
                </div>
            </form>
            <a href="#" id="show-register" class="toggle-link">Belum punya akun? Daftar di sini</a>
        </div>
        <div class="center" id="register-form" style="display:none;">
            <h2>Register</h2>
            <!-- Untuk REGISTER -->
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <div class="button-row">
                    <button type="button" id="back-to-login" class="btn-row">Back</button>
                    <button type="submit" class="btn-row">Register</button>
                </div>
            </form>
            <a href="#" id="show-login" class="toggle-link">Sudah punya akun? Login di sini</a>
        </div>
        <script src="{{ asset('assets/js/login.js') }}"></script>
    </div>
</body>

</html>
