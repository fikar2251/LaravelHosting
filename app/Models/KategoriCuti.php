<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriCuti extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }
}
