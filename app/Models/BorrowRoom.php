<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRoom extends Model
{
    protected $table = "borrow_rooms";

    protected $fillable = [
        'user_id',
        'room_id',
        'no_hp',
        'tgl_pinjam',
        'waktu_mulai',
        'waktu_selesai',
        'status',
        'surat_pdf'
    ];
}
