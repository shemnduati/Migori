<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Ward extends Model
{
    use HasApiTokens;
    protected $guarded= [];

    public function county()
    {
    	return $this->belongsTo(\App\County::class);
    }

    public function geographical(){
        return $this->hasOne(Geographical::class, 'Ward');
    }


}
