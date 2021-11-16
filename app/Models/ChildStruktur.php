<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildStruktur extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent_struktur()
    {
        return $this->belongsTo(ParentStruktur::class);
    }
}
    