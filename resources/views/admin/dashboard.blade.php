<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            padding: 20px 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 220px;
            padding: 30px;
        }

        .header {
            background-color: white;
            padding: 15px 30px;
            border-bottom: 1px solid #ddd;
        }

        .main {
            padding: 20px;
            background-color: white;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }

        .main h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Kelola Produk</a>
        <a href="#">Pesanan</a>
        <a href="#">Pengguna</a>
        <a href="#">Pengaturan</a>
        <a href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <div class="content">
        <div class="header">
            <h1>Selamat Datang, Admin</h1>
        </div>

        <div class="main">
            <h3>Statistik Singkat</h3>
            <p>Produk: 120</p>
            <p>Pesanan Hari Ini: 18</p>
            <p>Pengguna Terdaftar: 254</p>
        </div>
    </div>

</body>
</html>
