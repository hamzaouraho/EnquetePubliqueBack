<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    protected $table = 'requetes';
    protected $fillable = ['nom','tf','page','commentaire','situation','image','etudeId'] ;
    use HasFactory;
}
