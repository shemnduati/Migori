<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Geographical extends Model
{
    use HasApiTokens;
    protected $guarded= [];
    protected $table = 'geographical';
}
