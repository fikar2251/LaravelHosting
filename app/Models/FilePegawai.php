<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePegawai extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function access()
    {
        return $this->hasMany(Access::class);
    }
}
