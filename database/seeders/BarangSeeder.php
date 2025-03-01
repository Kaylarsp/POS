<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'E001',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 5500000,
                'harga_jual' => 5750000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'E002',
                'barang_nama' => 'Laptop',
                'harga_beli' => 7500000,
                'harga_jual' => 8050000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'P001',
                'barang_nama' => 'Baju Tidur',
                'harga_beli' => 50000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'P002',
                'barang_nama' => 'Hoodie',
                'harga_beli' => 250000,
                'harga_jual' => 325000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'M001',
                'barang_nama' => 'Roti',
                'harga_beli' => 7000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'M002',
                'barang_nama' => 'Snack',
                'harga_beli' => 5000,
                'harga_jual' => 5500,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'MI001',
                'barang_nama' => 'Kopi',
                'harga_beli' => 25000,
                'harga_jual' => 26500,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'MI002',
                'barang_nama' => 'Teh',
                'harga_beli' => 20000,
                'harga_jual' => 21500,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'AT001',
                'barang_nama' => 'Buku',
                'harga_beli' => 4000,
                'harga_jual' => 4500,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'AT002',
                'barang_nama' => 'Pulpen',
                'harga_beli' => 5000,
                'harga_jual' => 5500,
            ],
        ]);
    }
}
