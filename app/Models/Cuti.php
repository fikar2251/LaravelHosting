<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kategori_cuti()
    {
        return $this->belongsTo(KategoriCuti::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
