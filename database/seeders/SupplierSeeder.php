<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'nama_supplier' => 'PT Sumber Makmur',
                'alamat_supplier' => 'Jl. Merdeka No. 10, Surabaya',
                'telp_supplier' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_supplier' => 'CV Maju Terus',
                'alamat_supplier' => 'Jl. Diponegoro No. 25, Malang',
                'telp_supplier' => '082233445566',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_supplier' => 'UD Sinar Abadi',
                'alamat_supplier' => 'Jl. Raya Banyuwangi No. 7',
                'telp_supplier' => '081998877665',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
