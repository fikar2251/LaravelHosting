<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function file_pegawai()
    {
        return $this->belongsTo(FilePegawai::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
