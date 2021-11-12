<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPernikahan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class,'status_perkawinan_id');
    }
}
