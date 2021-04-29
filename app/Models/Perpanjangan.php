<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
    use HasFactory;
    protected $table = "perpanjangan";
    protected $fillable = [        
        'berkas',
        'tgl',
        'id_lembaga',
        'status',
    ];
    public $timestamps = false;
}
