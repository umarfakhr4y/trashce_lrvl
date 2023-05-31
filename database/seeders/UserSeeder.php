<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleadmin = Role::where('name', 'admin')->first();
        $roleuser = Role::where('name', 'user')->first();

        // admin
        $admin = User::create([
            'nik_user' => '3175070000000000',
            'full_name' => 'admin',
            'address' => 'Jl. Menteng Atas',
            'phone_number' => '081918411227',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        
        $admin->assignRole('admin');

        
        //user
        $user = User::create([
            'nik_user' => '31710456611000',
            'full_name' => 'Alya Regina Putri',
            'address' => 'Jl. Perum kopi',
            'phone_number' => '0819184116231',
            'email' => 'alya@gmail.com',
            'password' => bcrypt('alya123'),
        ]);
        $user->assignRole('user');

        $user = User::create([
            'nik_user' => '31710456102233',
            'full_name' => 'Audyna Renata',
            'address' => 'Jl. Dasana Indah',
            'phone_number' => '081918411244',
            'email' => 'audy@gmail.com',
            'password' => bcrypt('audy123'),
        ]);
        $user->assignRole('user');

        $user = User::create([
            'nik_user' => '31710456102216',
            'full_name' => 'Ghaida Danaya',
            'address' => 'Jl. Mardani',
            'phone_number' => '0812566100234',
            'email' => 'danaya@gmail.com',
            'password' => bcrypt('danaya123'),
        ]);
        $user->assignRole('user');

        $user = User::create([
            'nik_user' => '31710456100566',
            'full_name' => 'Marsyanda Razita',
            'address' => 'Jl. Bungur Besar V',
            'phone_number' => '0819182222779',
            'email' => 'syanda@gmail.com',
            'password' => bcrypt('syanda123'),
        ]);
        $user->assignRole('user');

        //petugas
        $user = User::create([
            'nik_user' => '3175070000000001',
            'full_name' => 'joko winarto',
            'address' => 'Jl. Mawar lila',
            'phone_number' => '081918411691',
            'email' => 'joko@gmailcom',
            'password' => bcrypt('123123123'),
        ]);
        $user->assignRole('petugas');

        $user = User::create([
            'nik_user' => '3175070000000002',
            'full_name' => 'dimas ukina',
            'address' => 'Jl. kampung tanduk',
            'phone_number' => '081918411692',
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        $user->assignRole('petugas');

        $user = User::create([
            'nik_user' => '3175070551000777',
            'full_name' => 'Laila Resya',
            'address' => 'Jl. Rimar Tandu',
            'phone_number' => '081918411277',
            'email' => 'lailre@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        $user->assignRole('petugas');
    }
}
