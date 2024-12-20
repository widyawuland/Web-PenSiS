<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'siswa';

    protected $fillable = ['nama_siswa', 'foto', 'kelas'];

    protected $dates = ['deleted_at'];

    protected $hidden = ["id"];

    public function vouchers()
    {
        return $this->hasOne(Voucher::class);
    }

}
