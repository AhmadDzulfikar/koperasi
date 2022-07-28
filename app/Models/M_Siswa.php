<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class M_Siswa extends Model
{
    use softDeletes;

    protected $table = 'siswa';
    protected $fillable = [
        'nama',
        'kelamin',
        'nisn'
    ];

    protected $hidden;
}
