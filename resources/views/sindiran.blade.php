<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Halaman Cantik</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;500&display=swap');

    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #fbd3e9, #bb377d);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 1s ease;
    }

    .card h1 {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #e75480;
      margin-bottom: 20px;
    }

    .card p {
      font-size: 1rem;
      color: #555;
    }

    .btn {
      margin-top: 25px;
      background: #e75480;
      border: none;
      color: #fff;
      padding: 12px 25px;
      border-radius: 30px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #c73866;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Hai Arik Cantik! 💕</h1>
    <p>Selamat datang di halaman paling manis dan feminin sealam semesta, Arik! 🌸</p>
    <button class="btn">Terima Kasih</button>
  </div>
</body>
</html>
