<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Muhammad Zahran Arrafi Ananda',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'foto' => '',
                'status' => 'Aktif',
                'role' => 'Admin'
            ],
            [
                'name' => 'Muhammad Rio',
                'username' => 'kasir',
                'password' => Hash::make('kasir'),
                'foto' => '',
                'status' => 'Aktif',
                'role' => 'Kasir'
            ]
        ];
        User::insert($data);
    }
}
