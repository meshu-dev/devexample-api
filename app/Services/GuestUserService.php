<?php

namespace App\Services;

use App\Enums\GuestUserEnum;
use App\Exceptions\MaxRequestLimitException;
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
        $guestUser = $this->guestUserRepository->add(['ip_address' => $ipAddress]);

        $this->bookmarkService->createBookmarks($guestUser);

        return $guestUser;
    }

    public function getAccount(string $ipAddress): GuestUser
    {
        $guestUser = $this->guestUserRepository->getByIpAddress($ipAddress);

        if ($guestUser) {
            throw_if(
                $guestUser->requests >= GuestUserEnum::MAX_REQUEST_LIMIT->value,
                MaxRequestLimitException::class
            );

            $guestUser->increment('requests');
            $guestUser->save();
        } else {
            $guestUser = $this->createAccount($ipAddress);
        }
        return $guestUser;
    }
}
