<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStruktur extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function child_struktur()
    {
        return $this->hasMany(ChildStruktur::class);
    }
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class,'organisasi_id');
    }
}
