@extends('layouts.mainsuccess')
<br><br><br><br><br>

    <!-- tampilan untuk menampilkan hasil pencarian -->
    <ul><h2>Hasil Pencarian</h2></ul>
    <hr>

    <!-- Pengecekan apakah terdapat produk yang sesuai dengan pencarian -->
    @if($products->count() > 0)
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="product">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-100">
                            <br>
                            <p>{{ $product->name }}</p>
                            <p>Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Jika tidak ada produk yang sesuai dengan pencarian -->
    @else
        <ul>Tidak ada produk yang cocok dengan pencarian Anda.</ul>
        <br><br><br><br>
    @endif

