<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function kategori_sppd()
    {
        return $this->belongsTo(KategoriSppd::class);
    }
}
