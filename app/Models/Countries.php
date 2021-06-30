<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'name',   
        'post_id' 
              
    ];

    public function Countries(){
        return $this->belongsTo(Countries::class);
    }

}
