<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <div class="cart-container">
        <a href="{{ url('/') }}" class="cart-checkout-btn" style="background: #f5f5f5; color: #ff5722; border: 1px solid #ff5722; margin-bottom: 18px; margin-right: 12px; padding: 10px 28px;">
            &#8592; Kembali ke Beranda
        </a>
        <h2 class="cart-title">Keranjang Belanja</h2>

        @if(count($cart) > 0)
            <table class="cart-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="cart-checkbox"></th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
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
                            <td><input type="checkbox" class="cart-checkbox"></td>
                            <td style="display: flex; align-items: center; gap: 10px;">
                                <img src="{{ $item['image'] ?? asset('assets/img/default.png') }}" alt="Produk" class="cart-img">
                                <span class="cart-product-name">{{ $item['name'] }}</span>
                            </td>
                            <td><span class="cart-price">Rp {{ number_format($item['price']) }}</span></td>
                            <td>
                                <div class="cart-qty">
                                    <button class="cart-qty-btn" type="button">-</button>
                                    <span>{{ $item['quantity'] }}</span>
                                    <button class="cart-qty-btn" type="button">+</button>
                                </div>
                            </td>
                            <td><span class="cart-price">Rp {{ number_format($subtotal) }}</span></td>
                            <td>
                                <button class="cart-remove-btn" title="Hapus">&#10005;</button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong>Total</strong></td>
                        <td colspan="2"><strong class="cart-price">Rp {{ number_format($total) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <button class="cart-checkout-btn" onclick="window.location='{{ route('cart.checkout') }}'">Lanjut ke Checkout</button>
        @else
            <div class="empty-cart">Keranjang kamu masih kosong.</div>
        @endif
    </div>
</body>
</html>
