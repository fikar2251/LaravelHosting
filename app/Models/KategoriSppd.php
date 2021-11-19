<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSppd extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sppd()
    {
        return $this->hasMany(Sppd::class);
    }
}
