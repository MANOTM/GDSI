<?php

namespace App\Models;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function etablissemet(): BelongsTo
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function employer_call()
    {
        return $this->hasMany(employer_call::class);
    }
}
