<?php

namespace App\Services;

use App\Enums\GuestUserEnum;
use App\Exceptions\MaxRequestLimitException;
use App\Models\GuestUser;
use App\Repositories\GuestUserRepository;
use Carbon\CarbonImmutable;

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

    public function deleteExpiredAccounts(): array
    {
        $expiryTime     = CarbonImmutable::now()->subHours(GuestUserEnum::ACCOUNT_TIME_LIMIT->value);
        $expiredUsers   = $this->guestUserRepository->getExpired($expiryTime);
        $deletedUserIds = [];

        foreach ($expiredUsers as $expiredUser) {
            $this->bookmarkService->deleteUserBookmarks($expiredUser->id);
            $this->guestUserRepository->delete($expiredUser->id);
            $deletedUserIds[] = $expiredUser->id;
        }
        return $deletedUserIds;
    }
}
