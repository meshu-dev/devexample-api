<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends GuestDataRepository
{
    public function __construct(Country $country)
    {
        parent::__construct($country);
    }
}
