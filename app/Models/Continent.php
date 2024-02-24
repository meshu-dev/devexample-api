<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $table = 'continents';
    protected $fillable = ['guest_user_id', 'name'];

    public $timestamps = false;
}
