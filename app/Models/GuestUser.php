<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class GuestUser extends Authenticatable
{
    protected $fillable = [
        'ip_address',
        'requests'
    ];
}
