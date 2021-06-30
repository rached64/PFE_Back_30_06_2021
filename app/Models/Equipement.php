<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    protected $table = "post_equipement";
    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'id',
        'title',
        'description',
        'price',
        'category_id'
    ];
    public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    
}
