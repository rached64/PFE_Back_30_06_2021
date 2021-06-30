<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Countries ;


class State extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'name',   
        'countries_id'             
    ];

    public function Countries(){
        return $this->belongsTo(Countries::class);
    }
  
    function getState($countries_id)
    {
        $data = DB::table('states')->where('countries_id',$countries_id)->get();
        return $data ;
    }
}
