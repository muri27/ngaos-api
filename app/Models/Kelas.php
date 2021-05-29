<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'namaKelas',
        'idPengajar',
        'waktuMulai',
        'waktuSelesai',
        'isTersedia',
        'kuotaKelas',
        'deskripsiKelas',
        'biaya',
        'linkGrupWa',
<<<<<<< HEAD
        'fotoKelas',
        'idUser'
    ];

    protected $casts = [
        'idUser' => 'array'
=======
        'fotoKelas'
>>>>>>> 29284657195ff0ebd477c3f5c7e341c89586b290
    ];
}
