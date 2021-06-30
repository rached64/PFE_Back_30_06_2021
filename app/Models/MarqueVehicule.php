<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarqueVehicule extends Model
{
    use HasFactory;
    protected $table = "marque_vehicule";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = 
    [
        'nom',
        'modele_id'
    ];
    public function marque(){
        return $this->belongsTo(Modele::class,'modele_id');
    }
}
