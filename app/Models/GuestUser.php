<?php

namespace App\Models;

use App\Enums\GuestUserEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GuestUser extends Authenticatable
{
    protected $fillable = [
        'ip_address',
        'requests'
    ];

    protected function requestsLeft(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => GuestUserEnum::LIMIT->value - $attributes['requests'],
        )->withoutObjectCaching();
    }
}
