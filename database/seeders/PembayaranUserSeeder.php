<?php

namespace Database\Seeders;

use App\Models\PembayaranUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'April',
            'users_id' => '2',
        ]);
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Mei',
            'users_id' => '2',
        ]);
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Juni',
            'users_id' => '2',
        ]);
        
        
        
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'April',
            'users_id' => '3',
        ]);
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Mei',
            'users_id' => '3',
        ]);
        PembayaranUser::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Juni',
            'users_id' => '3',
        ]);
        
    }
}
