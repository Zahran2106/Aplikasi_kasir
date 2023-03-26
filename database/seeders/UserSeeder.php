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
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'foto' => '',
                'status' => 'Aktif',
                'role' => 'Admin'
            ],
            [
                'name' => 'Kasir',
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
