<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Repositories\CountryRepository;

class CountryController extends GuestDataController
{
    protected string $apiRequestClass = CountryRequest::class;
    protected string $jsonResourceClass = CountryResource::class;

    public function __construct(
        protected CountryRepository $countryRepository
    ) {
        parent::__construct($countryRepository);
    }
}
