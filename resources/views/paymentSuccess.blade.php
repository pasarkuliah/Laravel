@extends('layouts.mainsuccess')
<br><br><br><br><hr>

<div class="container mt-5">
    <div class="card">
        <div class="card-body text-center">         
            <!-- Judul pesan -->
            <h2 class="text-danger">Pesanan di terima !</h2>
            
            <!-- pemberitahuan -->
            <p class="mt-3">"Terima kasih atas pesanan Anda. Pesanan Anda sedang kami proses dan akan segera kami konfirmasi melalui aplikasi whatsapp. Jika anda ingin menanyakan informasi terkait pesanan anda, dapat menghubungi  nomor berikut : whatsapp : 082257568458."</p>
            
            <!-- Tombol kembali ke halaman utama -->
            <div class="mt-4">
                <a href="{{ route('homesuccess') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>