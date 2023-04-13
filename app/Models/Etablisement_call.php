<?php

namespace App\Models;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablisement_call extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'etablisement_id',
        'quantite',
        'quantiteTotal',
        'marche_id',
        'date',
    ];

    public function etablisement()
    {
        return $this->belongsTo(Etablissement::class);
    }
    public function article()
    {
        return $this->belongsTo(article::class);
    }
}
