<?php

namespace App\Repositories;

use App\Models\GuestUser;

class GuestUserRepository
{
    public function add(array $params): GuestUser
    {
        $params['requests'] = 1;
        return GuestUser::create($params);
    }

    public function getByIpAddress(string $ip): GuestUser|null
    {
        return GuestUser::where('ip_address', $ip)->first();
    }
}
