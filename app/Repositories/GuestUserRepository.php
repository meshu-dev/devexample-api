<?php

namespace App\Repositories;

use App\Models\GuestUser;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;

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

    public function getExpired(CarbonImmutable $expiryAt): Collection
    {
        return GuestUser::where('created_at', '<=', $expiryAt)->get();
    }

    public function delete(int $id): bool
    {
        return GuestUser::destroy($id);
    }
}
