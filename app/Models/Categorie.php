<?php

namespace App\Models;
use App\Models\Supplement;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['nom_categorie','prix','produit_id'];

    public function supplements(){
        return $this->hasMany(Supplement::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
