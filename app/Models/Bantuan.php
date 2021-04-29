<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan_bantuan";
    protected $fillable = [        
        'berkas',
        'tgl',
        'id_lembaga',
        'status',
        'jenis',
    ];
    public $timestamps = false;
}
