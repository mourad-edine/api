<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    use HasFactory;
    protected $table = 'supplements';
    protected $fillable = ['nom_supplement','prix','categorie_id'];

    public function categories(){
        return $this->belongsTo(Categorie::class);;
    }
}
