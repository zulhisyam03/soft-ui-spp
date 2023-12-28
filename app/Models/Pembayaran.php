<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'prodi',
        'semester',
        'tahun_ajaran',
        'amount',
        'pict_bukti',
        'status',
    ];

    public function pembayaranUser(){
        return $this->belongsTo(User::class, 'nim','nim');
    }

    public function pembayaranImages(){
        return $this->belongsTo(Images::class, 'id', 'pict_bukti');
    }
}
