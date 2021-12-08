<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function penerimaan()
    {
        return $this->hasMany(RincianGaji::class)->where('tipe','penerimaan');
    }
    public function potongan()
    {
        return $this->hasMany(RincianGaji::class)->where('tipe','potongan');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
