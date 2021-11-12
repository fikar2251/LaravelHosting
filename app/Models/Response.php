<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class);
    }
}
