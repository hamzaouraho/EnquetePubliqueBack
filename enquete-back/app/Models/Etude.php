<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etude extends Model
{
    
    protected $table = 'Etudes';
    protected $fillable = ['titre' ,'typeDoc' ,'intitule' ,'dateDebut' ,'commune' ,'agenceUrba','perimetre' ,'pictureUrl'] ;
    use HasFactory;
}

