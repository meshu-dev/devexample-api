<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Bookmark;

class BookmarkRepository
{
    public function getAll(array $params): Collection
    {
        return Bookmark::where('guest_user_id', $params['guest_user_id'])->get();
    }

    public function get(int $guestUserId, int $id): Collection
    {
        return Bookmark::where('guest_user_id', $guestUserId)
                       ->where('id', $id)
                       ->first();
    }

    public function add(array $params): Bookmark
    {
        return Bookmark::create($params);
    }
}
