<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'nomorWa',
        'email',
        'fotoPengajar',
        'biodata',
        'kartuIdentitas'
    ];
}
