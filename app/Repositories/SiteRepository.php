<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Site;

class SiteRepository
{
    public function getAll(): Collection
    {
        return Site::get();
    }

    public function getAllByCategory(int $siteCategoryId): Collection
    {
        return Site::where('site_category_id', $siteCategoryId)->get();
    }
}
