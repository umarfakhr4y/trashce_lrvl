<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranUserKeamanan extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'pembayaran_user_keamanans';
    protected $fillable = [
        'status',
        'pembayaran_tanggal',
        'users_id'
    ];
}