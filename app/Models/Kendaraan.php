<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Kendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function detailKendaraan()
    {
        return $this->belongsTo(DetailKendaraan::class);
    }
}
