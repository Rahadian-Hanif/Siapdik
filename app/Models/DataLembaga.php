<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLembaga extends Model
{
    use HasFactory;
    protected $table = "lembaga";
    protected $fillable = [        
        'id_user',
        'nama_lembaga',
        'jumlah_guru_lk',
        'jumlah_guru_pr',
        'jumlah_murid_lk',
        'jumlah_murid_pr',
        'akreditasi',
        'kecamatan',
        'alamat',
        'no_izin_pendirian',
        'tahun_pendirian',
        'NPSN',
        'no_sk_kemenkumham',
        'nama_kepala_lembaga',
        'tlp',

    ];
    public $timestamps = false;
}
