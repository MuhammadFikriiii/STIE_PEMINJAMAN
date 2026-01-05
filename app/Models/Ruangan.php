<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'status_ruangan',
        'foto_ruangan'
    ];
}
