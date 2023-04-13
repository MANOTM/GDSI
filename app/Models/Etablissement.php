<?php

namespace App\Models;

use App\Models\Db;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etablissement extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function employer(): HasMany
    {
        return $this->hasMany(Employer::class);
    }

    public function Db(): BelongsTo
    {
        return $this->belongsTo(Db::class);
    } 
}
