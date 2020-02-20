<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class County extends Model
{
    use HasApiTokens;

    protected $guarded= [];
    public function wards()
    {
      return $this->hasMany(\App\Ward::class);  
    }
}
