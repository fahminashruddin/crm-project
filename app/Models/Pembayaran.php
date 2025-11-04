<?php

namespace App\Models; // <-- 1. Pastikan namespace-nya App\Models

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- 2. Tambahkan HasFactory (praktik baik)
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    /**
     * 3. Tambahkan ini agar $record->update() di widget Anda berfungsi.
     * Ini mengizinkan semua kolom untuk diisi.
     */
    protected $guarded = [];

    /**
     * Relasi ke model Pesanan
     */
    public function pesanan()
    {
        // 4. Pastikan Anda memiliki 'use App\Models\Pesanan;'
        //    (Meskipun tidak perlu jika 'Pesanan' ada di namespace yang sama)
        return $this->belongsTo(Pesanan::class);
    }

    /**
     * Relasi ke model MetodePembayaran
     */
    public function metodePembayaran()
    {
        // 5. Pastikan Anda memiliki 'use App\Models\MetodePembayaran;'
        return $this->belongsTo(MetodePembayaran::class);
    }
}
