<?php

namespace App\Models;

use App\Models\Db;
use App\Models\marche;
use App\Models\article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class db_call extends Model
{
    use HasFactory;

    protected $fillable = [ 'quntite', 'date','marche_id','article_id','db_id','quntite_total' ];

    public function Db()
    {
        return $this->belongsTo(Db::class);
    }

    
    public function marche()
    {
        return $this->belongsTo(marche::class);
    }
    public function article()
    {
        return $this->belongsTo(article::class);
    }
}
