<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'level_id' => 1,
                'username' => 'admin',
                'nama' => 'Administrator',
                'password' => Hash::make('123456'),
            ],
            [
                'user_id' => 2,
                'level_id' => 2,
                'username' => 'manager',
                'nama' => 'Manager',
                'password' => Hash::make('123456'),
            ],
            [
                'user_id' => 3,
                'level_id' => 3,
                'username' => 'staff',
                'nama' => 'Staff/Kasir',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($data as $user) {
            DB::table('m_user')->updateOrInsert(
                ['user_id' => $user['user_id']], // Kondisi pencarian
                ['password' => $user['password']] // Data yang akan diupdate/insert
                // Kamu juga bisa menambahkan kolom lain yang perlu diupdate jika ada perubahan
            );
        }
    }
}
