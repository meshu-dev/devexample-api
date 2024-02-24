<?php

namespace App\Repositories;

use App\Models\Continent;

class ContinentRepository extends GuestDataRepository
{
    public function __construct(Continent $continent)
    {
        parent::__construct($continent);
    }
}
