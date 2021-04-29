<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBantuan extends Model
{
    use HasFactory;
    protected $table = "laporan_bantuan";
    protected $fillable = [        
        'berkas',
        'tgl',
        'id_lembaga',
        'status',
    ];
    public $timestamps = false;
}
