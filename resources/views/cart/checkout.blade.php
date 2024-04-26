@extends('layouts.mainsuccess')

<br><br><br><br><br>
<div class="container">

    <!-- Form untuk pengisian alamat dan metode pembayaran -->
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf <!-- token CSRF untuk keamanan -->

        <!-- pengisian data pemesanan -->
        <h4>Billing Information</h4>
        <hr>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number (WhatsApp):</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <!-- metode pembayaran -->
        <h4>Payment Method</h4>
        <div class="form-group">
            <label for="payment_method">Choose a payment method:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="cod">Cash On Delivery (COD)</option>
               
            </select>
        </div>

        <!-- Tombol untuk lakukan transaksi -->
        <button type="submit" class="btn btn-primary">Lakukan Transaksi</button>
    </form>
</div>
