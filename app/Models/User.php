<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderKendaraan()
    {
        return $this->hasMany(OrderKendaraan::class);
    }

    public function order()
    {
        return $this->hasMany(Oder::class);
    }

    public function order_kendaraan()
    {
        return $this->hasMany(OrderKendaraan::class);
    }
}
