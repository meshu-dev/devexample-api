<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\BookmarkCategory;

class BookmarkCategoryRepository
{
    public function getAll(array $params): Collection
    {
        return BookmarkCategory::get();
    }

    public function get(int $id): Collection
    {
        return BookmarkCategory::find($id)->first();
    }

    public function add(array $params): BookmarkCategory
    {
        return BookmarkCategory::create($params);
    }
}
