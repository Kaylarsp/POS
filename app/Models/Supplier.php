<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel (jamak dari nama model)
    protected $table = 'suppliers';

    // Primary key custom (default-nya 'id')
    protected $primaryKey = 'supplier_id';

    // Jika primary key bukan auto increment integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Jika tabel tidak memiliki kolom timestamps (created_at & updated_at)
    public $timestamps = true;

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'telp_supplier'
    ];
}
