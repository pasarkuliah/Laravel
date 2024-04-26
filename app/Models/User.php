<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', // Nama pengguna
        'email', // Alamat email
        'password', // Kata sandi
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     // menyembunyikan password dan token
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Kolom 'email_verified_at' akan di-cast menjadi tipe data datetime
        'password' => 'hashed', // Kolom 'password' akan di-cast menjadi tipe data hashed
    ];

    // Definisi relasi one-to-many ke model Cart
    public function carts()
{
    // Relasi 'hasMany' menunjukkan bahwa User dapat memiliki banyak Cart
    return $this->hasMany(Cart::class);
}

}
