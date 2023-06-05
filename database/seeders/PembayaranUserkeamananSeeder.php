<?php

namespace Database\Seeders;

use App\Models\PembayaranUserKeamanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranUserkeamananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PembayaranUserKeamanan::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'April',
            'users_id' => '2',
        ]);
        PembayaranUserKeamanan::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Mei',
            'users_id' => '2',
        ]);
        
        PembayaranUserKeamanan::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'April',
            'users_id' => '3',
        ]);
        PembayaranUserKeamanan::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Mei',
            'users_id' => '3',
        ]);
        
        PembayaranUserKeamanan::create([
            'status' => 'Berhasil',
            'pembayaran_bulan' => 'Juni',
            'users_id' => '3',
        ]);


    }
}