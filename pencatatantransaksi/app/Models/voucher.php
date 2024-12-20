<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'saldo', 'sisa_saldo', 'tanggal_berlaku'];
    protected $dates = ['tanggal_berlaku'];
   
    public function siswa()
    {
        return $this->belongsTo(Siswa::class)->withTrashed();
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class)->withTrashed();
    }

    public function updateSaldoDefault()
    {
        if (now()->diffInHours($this->tanggal_berlaku) >= 24) {
            $this->update([
                'saldo' => 15000,
                'sisa_saldo' => 15000,
                'tanggal_berlaku' => now(),
            ]);
        }
    }    
}