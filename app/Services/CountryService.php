<?php

namespace App\Services;

use App\Repositories\{ContinentRepository, CountryRepository};
use App\Services\JsonResourceService;

class CountryService extends GuestDataService
{
    public function __construct(
        protected JsonResourceService $jsonResourceService,
        protected ContinentRepository $continentRepository,
        protected CountryRepository $countryRepository
    ) {
        parent::__construct($jsonResourceService, $countryRepository);
    }

    protected function createData(int $guestUserId, array $resources)
    {
        $continents = $resources['continents'];
        $countries  = $resources['countries'];

        //$continentModels = $this->createContinents($guestUserId, $continents);
        $this->createCountries($guestUserId, [], $countries);
    }

    protected function createContinents(int $guestUserId, array $continents)
    {
        $continentModels = [];

        foreach ($continents as $continent) {
            $name = $continent['name'];
            $code = $continent['code'];

            $continentModels[$code] = $this->continentRepository->add([
                'guest_user_id' => $guestUserId,
                'name'          => $name
            ]);
        }
        return $continentModels;
    }

    protected function createCountries(int $guestUserId, array $continentModels, array $countries)
    {
        foreach ($countries as $country) {
            $name      = $country['name'];
            $code      = $country['code'];
            //$continent = $continentModels[$code];

            $this->countryRepository->add([
                'guest_user_id' => $guestUserId,
                //'continent_id'  => $continent->id,
                'name'          => $name
            ]);
        }
    }
}
