@extends('layouts.mainsuccess')

<br><br><br><br><br>
<div class="container">
    <!-- Judul untuk halaman keranjang belanja -->
    <h2>Shopping Cart</h2>
    <hr>

    <!-- Tabel untuk menampilkan item dalam keranjang -->
    <table class="table table-borderless table-cart">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <!-- Menampilkan gambar produk -->
                <td><img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" width="100"></td>
                
                <!-- Menampilkan nama produk -->
                <td>{{ $item->product->name }}</td>

                <!-- Menampilkan harga produk -->
                <td>{{ $item->product->price }}</td>
                
                <td>
                    <!-- Form untuk mengatur kuantitas -->
                    <form action="{{ route('cart.update', ['id' => $item->product->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <!-- Tombol Kurang -->
                        <button type="submit" name="action" value="decrease" class="btn btn-warning">-</button>
                        <!-- Menampilkan jumlah saat ini -->
                        <span>{{ $item->quantity }}</span>
                        <!-- Tombol Tambah -->
                        <button type="submit" name="action" value="increase" class="btn btn-success">+</button>
                    </form>
                </td>
                <td>
                    <!-- Tombol untuk menghapus item dari keranjang -->
                    <form action="{{ route('cart.remove', ['id' => $item->product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Menampilkan total harga dan tombol checkout -->
    <div>
        <p>Total Price: {{ $totalPrice }}</p>
        <!-- Tombol untuk menuju halaman checkout -->
        <div class="mt-3">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
        </div>      
    </div>
</div>
