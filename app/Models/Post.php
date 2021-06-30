<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'title',
        'description',
        'price'   , 
        'category_id',   
        'picture',
        'user_id',
       
        'Modele',
        'BoiteDeVitesse',
        'AnneeModele'   , 
        'Marque',   
        'YearOfRegistration' , 
        'TypePost',
        'PuissanceFiscale', 
        'Kilometrage'   ,
        'NombreDePortes',
        'NombreDePlaces',
        'carburant',
        'post_type_id' , 
            
    ];
     public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function tags(){
        return $this->belongsToMany(Categories::class)->where('category_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
