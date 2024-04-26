
<!-- Navigation -->
<nav
class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
data-aos="fade-down"
>
<div class="container">
  <a class="navbar-brand" href="/">
    <img src="/images/Logo_2 Pasku.png" width="160
    " alt="Logo" />
  </a>
  <div class="container">
    <div class="row">
      <div class="col-md-auto">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Baju Telkom" aria-label="Search">
          <button type="button" class="btn btn-secondary">Search</button  >
        </div>
      </div>
    </div>
  </div>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/categories.html">Categories</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="/register">Cart</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link logout-link" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    </ul>
  </div>
</div>
</nav>
    
    <div class="container">
      <!-- Judul untuk kategori -->
        <h2>Products in {{ $category->name }}</h2>
        <style>
            .product-name {
            font-size: 1.3rem; /* Ukuran font yang lebih besar */
            font-weight: bold; /* Berat font yang lebih tebal */
            color: #333; /* Warna teks yang lebih gelap */
            }
            .product-price {
            font-size: 1.2rem; /* Ukuran font yang lebih besar */
            font-weight: bold; /* Berat font yang lebih tebal */
            color: red; /* Warna teks hijau */
            margin-top: -22px;
            }
            .product-details {
            /* Memusatkan teks di tengah */
            margin-top: -37px;
            }
            .product-thumbnail img {
            width: 100%; /* Lebar gambar mengikuti lebar kolom */
            height: auto; /* Tinggi gambar diatur secara otomatis */
            max-width: 200px; /* Batas maksimum lebar gambar */
            max-height: 200px; /* Batas maksimum tinggi gambar */
            object-fit: contain; /* Menjaga rasio aspek gambar */
            }
            form {
                margin-top: -42px;
                margin-left: 110px;
                font-size: 1.5rem;
                
            }
           footer {
           display: flex;
           justify-content: center;
           align-items: center;
           text-align: center;
           padding: 20px;
           background-color: white; /* Warna latar belakang footer */
           }  
        </style>

        <div class="row">
          <!-- Menampilkan setiap produk -->
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="/logindulu" class="product-item">
                        <div class="product-thumbnail position-relative">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                    </a>

                    <!-- Detail produk -->
                    <div class="product-details mt-2">
                        <h5 class="product-name">{{ $product->name }}</h5>
                        <p class="product-price text-muted">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>

                        <!-- Form untuk menambahkan produk ke keranjang -->
                        <form method="POST" action="{{ route('cart.add') }}">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                          <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                        <hr>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
    <br>

    <!-- Footer -->
    <footer>
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <p class="pt-4 pb-2">
                2024 Pasar Kuliah. All Rights Reserved.
              </p>
            </div>
          </div>
        </div>
      </footer>
  

