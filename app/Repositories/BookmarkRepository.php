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

    public function get(int $guestUserId, int $id): Bookmark|null
    {
        return Bookmark::where('guest_user_id', $guestUserId)
                       ->where('id', $id)
                       ->first();
    }

    public function add(array $params): Bookmark
    {
        return Bookmark::create($params);
    }

    public function edit(int $id, array $params): int
    {
        return Bookmark::where('guest_user_id', $params['guest_user_id'])
                       ->where('id', $id)
                       ->update($params);
    }

    public function delete(int $guestUserId, int $id): bool
    {
        return Bookmark::where('guest_user_id', $guestUserId)
                       ->where('id', $id)
                       ->delete();
    }

    public function deleteByGuestId(int $guestUserId): bool
    {
        return Bookmark::where('guest_user_id', $guestUserId)
                       ->delete();
    }
}
