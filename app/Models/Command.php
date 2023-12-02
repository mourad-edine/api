<?php

namespace App\Models;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $table = 'commands';

    protected $fillable = ['designation','nombre','prix_unitaire','total','etat','choix','client_id'];

    public function client(){
        return $this->belongsTo(Client::class);;
    }
}
