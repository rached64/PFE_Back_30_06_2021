<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $table = "modele";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = 
    [
        'nom',
    ];
    public function marqueVihcule(){
        return $this->hasMany(MarqueVehicule::class);
    }
}
