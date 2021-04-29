<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literasi extends Model
{
    use HasFactory;
    protected $table = "literasi";
    protected $fillable = [        
        'id_lembaga',
        'NIP',
        'nama',
        'jenis_kelamin',
        'alamat',
        'jabatan',
        'jenis_buku',
        'judul_buku',
        'berkas',
        'tlp',
    ];
    public $timestamps = false;
}
