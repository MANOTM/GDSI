<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'marche_id','nom','prix','configue','observation','QuntiteInit','QuntiteActual'
    ];
    public function marche()
    {
        return $this->belongsTo(marche::class);
    }
}
