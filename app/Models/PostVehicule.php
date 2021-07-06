<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVehicule extends Model
{
    use HasFactory;
    protected $table = "post_vehicule";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'title',
        'description',
        'price'   , 
        'category',   
        'image',       
        'Modele',
        'BoiteDeVitesse',
        'AnneeModele'   , 
        'Marque',   
        'PuissanceFiscale', 
        'Kilometrage'   ,
        'NombreDePortes',
        'NombreDePlaces',
        'carburant',
            
    ];

}
