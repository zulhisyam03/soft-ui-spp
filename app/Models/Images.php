<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable =[
        'fileName',
        'fileType',
        'fileSize',
        'filePath'
    ];

    function imagesPembayaran(){
        return $this->hasOne(Pembayaran::class,'pict_bukti','id');
    }
}
