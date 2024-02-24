<?php

namespace App\Services;

use App\Repositories\GuestDataRepository;
use App\Services\JsonResourceService;

abstract class GuestDataService
{
    public function __construct(
        protected JsonResourceService $jsonResourceService,
        protected GuestDataRepository $guestDataRepository
    ) {
    }

    public function create(int $guestUserId)
    {
        $resources = $this->jsonResourceService->getResources('countries');
        $this->createData($guestUserId, $resources);
    }

    public function delete(int $guestUserId): bool
    {
        return $this->guestDataRepository->deleteByGuestId($guestUserId);
    }

    abstract protected function createData(int $guestUserId, array $resources);
}
