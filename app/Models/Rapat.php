<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function peserta_rapat()
    {
        return $this->hasMany(PesertaRapat::class);
    }
    public function file_rapat()
    {
        return $this->hasMany(FileRapat::class);
    }
}
