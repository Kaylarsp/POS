<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    protected $table = 't_stok'; // sesuaikan dengan nama tabelmu
    protected $primaryKey = 'stok_id';
    protected $fillable = ['barang_id', 'stok_jumlah'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}