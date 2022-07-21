<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
