<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }
}
