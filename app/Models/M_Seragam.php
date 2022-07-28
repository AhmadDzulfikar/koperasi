<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class M_Seragam extends Model
{
    use softDeletes;

    protected $table = 'seragam';
    protected $fillable = [
        // 'tanggal',
        'nama',
        'ukuran'
    ];

    protected $hidden;

}
