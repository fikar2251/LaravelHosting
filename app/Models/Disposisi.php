<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Disposisi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function getPossibleStatuses(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM disposisis WHERE Field = "tipe"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function response()
    {
        return $this->hasMany(Response::class);
    }
}
