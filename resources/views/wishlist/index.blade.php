@extends('layouts.app')

@section('content')
    <h1>Wishlist Saya</h1>

    @if($wishlists->isEmpty())
        <p>Belum ada produk disimpan.</p>
    @else
        <ul>
            @foreach($wishlists as $wishlist)
                <li>
                    {{ $wishlist->product->name }}
                    <form action="{{ route('wishlist.destroy', $wishlist->product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
