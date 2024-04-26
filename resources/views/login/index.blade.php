@extends('layouts.main')

   <!-- Page Content -->
   <br>
   <div class="page-content page-auth">
    <!-- auth -->
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login">
          <div class="col-lg-6 text-center">
            <img
              src="/images/login-placeholder.png"
              alt=""
              class="w-50 mb-4 mb-lg-none"
            />
          </div>
          <div class="col-lg-5">
            <h2>
              Belanja kebutuhan Perkuliahan, <br />
              menjadi lebih mudah
            </h2>

            <!-- Form login -->
            <form class="mt-3" action="{{ route('login.post') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" name="email" id="email" class="form-control w-75" required value="{{ old('email') }}">
                  @error('email') <!-- Menampilkan pesan error jika terjadi kesalahan validasi pada email -->
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" name="password" id="password" class="form-control w-75" required>
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Tombol login -->
              <button type="submit" class="btn btn-success btn-block w-75 mt-4">Login</button>
              <!-- Tautan untuk menuju halaman register -->
              <a class="btn btn-signup w-75 mt-2" href="/register.html">
                Register
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
