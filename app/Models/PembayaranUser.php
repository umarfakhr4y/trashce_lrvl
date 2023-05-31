<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranUser extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_users';
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'status',
        'pembayaran_bulan',
        'users_id'
    ];
}
