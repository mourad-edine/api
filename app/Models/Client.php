<?php

namespace App\Models;
use App\Models\Command;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['nom','password','adresse','status'];

    public function commands(){
        return $this->hasMany(Command::class);
    }
}
