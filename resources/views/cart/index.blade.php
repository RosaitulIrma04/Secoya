<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> {{-- jika ada --}}
</head>
<body>
    <div class="container" style="padding: 20px;">
        <h2>Keranjang Belanja</h2>

        @if(count($cart) > 0)
            <table border="1" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp {{ number_format($item['price']) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp {{ number_format($subtotal) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" align="right"><strong>Total</strong></td>
                        <td><strong>Rp {{ number_format($total) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <br>
            <a href="{{ route('cart.checkout') }}">Lanjut ke Checkout</a>
        @else
            <p>Keranjang kamu masih kosong.</p>
        @endif
    </div>
</body>
</html>
