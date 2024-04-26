@extends('layouts.mainsuccess')

 <!-- Page Content -->
 <div class="page-content page-home">
  <section class="store-carousel">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-in">
          <div
            id="storeCarousel"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#storeCarousel"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#storeCarousel" data-slide-to="1"></li>
              <li data-target="#storeCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Bagian untuk menampilkan kategori -->
<section class="store-trend-categories">
  <div class="container">
      <div class="row">
          <div class="col-12" data-aos="fade-up">
              <h5>Categories</h5>
          </div>
      </div>
      <div class="row">
          @foreach($categories as $category)
              <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <a class="component-categories d-block" href="{{ route('products.byCategory', ['id' => $category->id]) }}">
                      <div class="categories-image">
                          <img
                              src="/images/categories-{{ strtolower($category->name) }}.svg"
                              alt="{{ $category->name }} Categories"
                              class="w-100"
                          />
                      </div>
                      <p class="categories-text">
                          {{ $category->name }}
                      </p>
                  </a>
              </div>
          @endforeach
      </div>
  </div>
</section>

    <!-- Bagian untuk menampilkan produk -->
    <section class="store-new-products">
      <div class="container">
          <div class="row">
              <div class="col-12" data-aos="fade-up">
                  <h5>New Products</h5>
              </div>
          </div>
          <div class="row">
              @foreach($products as $product)
              <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <div class="product">
                      <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-100">
                      <p>{{ $product->name }}</p>
                      <p>Rp.{{ number_format($product->price, 0, ',', '.') }}</p>

                      <!-- Form untuk menambahkan produk ke keranjang -->
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
  </section>