<?php

namespace App\Models;

use App\Models\article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employer_call extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'quantiteTotal',
        'quantite',
        'marche_id', 
        'article_code',
        'employer_id',
        'article_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function article()
    {
        return $this->belongsTo(article::class);
    }

}
