<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class GuestDataRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function getAll(array $params): Collection
    {
        return $this->model
                    ->where('guest_user_id', $params['guest_user_id'])
                    ->get();
    }

    public function get(int $guestUserId, int $id): Model|null
    {
        return $this->model
                    ->where('guest_user_id', $guestUserId)
                    ->where('id', $id)
                    ->first();
    }

    public function add(array $params): Model
    {
        return $this->model->create($params);
    }

    public function edit(int $id, array $params): int
    {
        return $this->model
                    ->where('guest_user_id', $params['guest_user_id'])
                    ->where('id', $id)
                    ->update($params);
    }

    public function delete(int $guestUserId, int $id): bool
    {
        return $this->model
                    ->where('guest_user_id', $guestUserId)
                    ->where('id', $id)
                    ->delete();
    }

    public function deleteByGuestId(int $guestUserId): bool
    {
        return $this->model
                    ->where('guest_user_id', $guestUserId)
                    ->delete();
    }
}
