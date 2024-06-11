<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Site;

class SiteRepository
{
    public function getAll(array $params): Collection
    {
        $categoryId = $params['category_id'] ?? 0;

        if ($categoryId > 0) {
            return $this->getAllByCategory($categoryId);
        }
        return Site::get();
    }

    public function getAllByCategory(int $siteCategoryId): Collection
    {
        return Site::where('site_category_id', $siteCategoryId)->get();
    }
}
