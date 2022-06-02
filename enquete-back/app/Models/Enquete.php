<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    protected $table = 'Requetes';
    protected $fillable = ['nom','tf','page','commentaire','situation'] ;
    use HasFactory;
}
