<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            [
                'kategori_id' => 1,
                'nama' => 'Elektronik',
                'deskripsi' => 'Barang elektronik seperti laptop, HP, dan TV',
            ],
            [
                'kategori_id' => 2,
                'nama' => 'Pakaian',
                'deskripsi' => 'Berbagai jenis pakaian seperti kaos, kemeja, dan celana',
            ],
            [
                'kategori_id' => 3,
                'nama' => 'Makanan',
                'deskripsi' => 'Produk makanan seperti mie instan, roti, dan snack',
            ],
            [
                'kategori_id' => 4,
                'nama' => 'Minuman',
                'deskripsi' => 'Berbagai minuman seperti teh, kopi, dan jus',
            ],
            [
                'kategori_id' => 5,
                'nama' => 'Alat Tulis',
                'deskripsi' => 'Peralatan menulis seperti pensil, pulpen, dan buku',
            ],
        ]);
    }
}
