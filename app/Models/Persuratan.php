<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persuratan extends Model
{
    use HasFactory;
    protected $table = "persuratan";
    protected $fillable = [        
        'berkas',
        'tgl',
        'id_lembaga',
        'prihal',
        'jenis',
    ];
    public $timestamps = false;
}
