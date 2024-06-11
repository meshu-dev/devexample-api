<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['guest_user_id', 'name'];

    public $timestamps = false;
}
