<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;
    protected $table = "carburant";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = 
    [
        'nom_carburant',
    ];
}
