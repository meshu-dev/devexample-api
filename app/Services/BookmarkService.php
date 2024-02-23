<?php

namespace App\Services;

use App\Models\GuestUser;
use App\Repositories\BookmarkRepository;
use Illuminate\Http\File;

class BookmarkService
{
    public function __construct(
        protected BookmarkRepository $bookmarkRepository
    ) {
    }

    public function createBookmarks(GuestUser $guestUser)
    {
        $data = $this->getBookmarkResources();

        $bookmarks = $data['bookmarks'];
        $this->createUserBookmarks($guestUser, $bookmarks);
    }

    protected function createUserBookmarks(GuestUser $guestUser, array $bookmarks)
    {
        foreach ($bookmarks as $bookmark) {
            $this->bookmarkRepository->add([
                'guest_user_id' => $guestUser->id,
                'name' => $bookmark['name'],
                'url' => $bookmark['url']
            ]);
        }
    }

    protected function getBookmarkResources()
    {
        $filePath = resource_path() . '/json/bookmarks.json';
        $json = (new File($filePath))->getContent();

        return json_validate($json) ? json_decode($json, true) : null;
    }

    public function deleteUserBookmarks(int $guestUserId): bool
    {
        return $this->bookmarkRepository->deleteByGuestId($guestUserId);
    }
}
