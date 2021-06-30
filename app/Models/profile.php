<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $table = "profile";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = 
    [
        'id',
        'nom',
        'email', 
        'password',
        'telephone',
        'picture',
        'user_id'
    ];
 
}
