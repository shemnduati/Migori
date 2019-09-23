<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Budget extends Model
{
    use HasApiTokens;
    protected $guarded = [];
    protected $table = 'budgets';
}
