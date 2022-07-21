<?php

namespace App\Models;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
