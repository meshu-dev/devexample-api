<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\GuestUser;
use App\Repositories\GuestUserRepository;

class GuestUserService
{
    public function __construct(
        protected GuestUserRepository $guestUserRepository,
        protected BookmarkService $bookmarkService
    ) {
    }

    public function createAccount(string $ipAddress): GuestUser
    {
        $guestUser = $this->guestUserRepository->add(['ip_address' => $ipAddress, 'requests' => 1]);

        $this->bookmarkService->createBookmarks($guestUser);

        return $guestUser;
    }

    public function getAccount(string $ipAddress): GuestUser
    {
        $guestUser = $this->guestUserRepository->getByIpAddress($ipAddress);

        if ($guestUser) {
            $guestUser->increment('requests');
            $guestUser->save();
        } else {
            $guestUser = $this->createAccount($ipAddress);
        }
        return $guestUser;
    }
}
