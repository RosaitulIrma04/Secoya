<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your Shopping Cart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #343a40;
      color: #fff;
      padding: 15px 30px;
      font-size: 1.2rem;
    }

    main {
      padding: 40px 60px;
    }

    h2 {
      margin-bottom: 25px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    table th, table td {
      padding: 15px;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background-color: #f1f1f1;
      text-align: left;
    }

    table tr:hover {
      background-color: #f9f9f9;
    }

    .btn-delete {
      background-color: #e3342f;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-delete:hover {
      background-color: #cc1f1a;
    }

    .total {
      text-align: right;
      font-weight: bold;
      font-size: 1.2rem;
      margin-top: 20px;
    }

    .btn-checkout {
      float: right;
      margin-top: 15px;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn-checkout:hover {
      background-color: #0062cc;
    }

    .btn-back {
      display: inline-block;
      margin-top: 40px;
      background-color: #6c757d;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-back:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>
  <header>
    Your Cart
  </header>

  <main>
    <h2>Items in Your Cart</h2>

    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse (session('cart', []) as $key => $item)
        <tr>
          <td>{{ $item['name'] }}</td>
          <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
          <td>
            <form action="{{ route('cart.remove', $key) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-delete" onclick="return confirm('Hapus item ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align: center;">Keranjang Anda kosong.</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    @if(session('cart') && count(session('cart')) > 0)
    <div class="total">
      Total:
      Rp {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))), 0, ',', '.') }}
    </div>

    <form action="{{ route('cart.checkout') }}" method="POST">
      @csrf
      <button type="submit" class="btn-checkout">Checkout</button>
    </form>
    @endif

    <a href="{{ url()->previous() }}" class="btn-back">← Back</a>
  </main>
</body>
</html>
