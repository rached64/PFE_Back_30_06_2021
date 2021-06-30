<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post ;
use App\Models\Equipement ;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['name','description','picture'];
    public $timestamps = true;

    public function post(){
        return $this->hasMany(Post::class);
    }
    public function postEquipment(){
        return $this->hasMany(Equipement::class);
    }
 
}
