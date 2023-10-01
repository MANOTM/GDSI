<?php

namespace App\Models;

use App\Models\article;
use App\Models\db_call;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class marche extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code','type','date','objet','annee','montant','entreprise'
    ];

    public function articles()
    {
        return $this->hasMany(article::class);
    }
    public function db_calls()
    {
        return $this->hasMany(db_call::class);
    }
}
