<?php

namespace App\Services;

use App\Repositories\CountryRepository;
use App\Services\JsonResourceService;

class CountryService extends GuestDataService
{
    public function __construct(
        protected JsonResourceService $jsonResourceService,
        protected CountryRepository $countryRepository
    ) {
        parent::__construct($jsonResourceService, $countryRepository);
    }

    protected function createData(int $guestUserId, array $resources)
    {
        $countries  = $resources['countries'];
        $this->createCountries($guestUserId, $countries);
    }

    protected function createCountries(int $guestUserId, array $countries)
    {
        foreach ($countries as $country) {
            $this->countryRepository->add([
                'guest_user_id' => $guestUserId,
                'name'          => $country['name']
            ]);
        }
    }
}
