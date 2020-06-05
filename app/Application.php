<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Application extends Model
{
    use HasApiTokens;
    protected $guarded = [];
    protected $table = 'applications';

    public function family(){
        return $this->hasMany(Family::class, 'applicationId');
    }

    public function institution(){
        return $this->hasOne(Institution::class, 'applicationId');
    }

    public function geographical(){
        return $this->hasOne(Geographical::class, 'applicationId');
    }
}
