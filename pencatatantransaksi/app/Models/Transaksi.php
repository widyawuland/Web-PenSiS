<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];

    protected $fillable = [
        'voucher_id',
        'jumlah_pengurangan',
        'sisa_saldo',
        'tanggal_transaksi',
    ];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

}