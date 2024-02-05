<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\SiteCategory;

class SiteCategoryRepository
{
    public function getAll(): Collection
    {
        return SiteCategory::get();
    }
}
