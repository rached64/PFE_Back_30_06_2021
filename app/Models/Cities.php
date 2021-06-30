<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Cities ;




class Cities extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'name',   
        'state_id' 
              
    ];

  
    public function Cities(){
        return $this->belongsTo(Cities::class);
    }
    function getCities($state_id)
    {
        $data = DB::table('cities')->where('state_id',$state_id)->get();
        return $data ;
    }
}
