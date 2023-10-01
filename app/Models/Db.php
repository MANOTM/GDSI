<?php

namespace App\Models;

use App\Models\Etablissement;
use App\Models\db_call;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Db extends Model
{
    use HasFactory;
    public function etablissement(): HasMany
    {
        return $this->hasMany(Etablissement::class);
    }

    public function db_call()
    {
        return $this->hasMany(db_call::class);
    }
}
