@extends('layouts.main')
 
 <!-- Page Content -->
 <br><br><br>
 <div class="page-content page-auth mt-5" id="register">
  <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <h2>
            Memulai untuk membeli <br />
            kebutuhan kuliah kalian 
          </h2>

          <!-- Form registrasi -->
          <form class="mt-3" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required value="{{ old('username') }}">
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Tombol untuk melakukan registrasi -->
            <button type="submit" class="btn btn-success btn-block mt-4">
              Register Now
            </button>
            <!-- Tombol untuk kembali ke halaman login -->
            <button type="submit" class="btn btn-signup btn-block mt-2">
              Back to Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
