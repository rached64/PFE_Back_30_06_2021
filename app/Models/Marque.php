<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $table = "marque";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = 
    [
        'nom',
    ];
    
  
}
