<?php

namespace App\Models;
use App\Models\Command;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplie extends Model
{
    use HasFactory;

    protected $table = 'supplies';
    protected $fillable = ['supplie','command_id'];

    public function command(){
        return $this->belongsTo(Command::class);;
    }
}
