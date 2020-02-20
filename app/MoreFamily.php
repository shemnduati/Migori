<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class MoreFamily extends Model
{
    use HasApiTokens;
    protected $guarded= [];
    protected $table = 'morefamily';
}
