<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $guarded= [];

    public function county()
    {
    	return $this->belongsTo(\App\County::class);
    }
}
