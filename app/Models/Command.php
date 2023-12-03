<?php

namespace App\Models;
use App\Models\Client;
use App\Models\Supplie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Command extends Model
{
    use HasFactory;
    protected $table = 'commands';

    protected $fillable = ['designation','nombre','prix_unitaire','total','etat','choix','client_id'];

    public function client(){
        return $this->belongsTo(Client::class);;
    }
    public function supplies(){
        return $this->hasMany(Supplie::class);;
    }
}
