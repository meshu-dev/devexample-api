<?php

namespace App\Services;

use App\Models\GuestUser;
use App\Repositories\{BookmarkRepository, BookmarkCategoryRepository};
use Illuminate\Http\File;

class BookmarkService
{
    public function __construct(
        protected BookmarkRepository $bookmarkRepository,
        protected BookmarkCategoryRepository $bookmarkCategoryRepository
    ) {
    }

    public function createBookmarks(GuestUser $guestUser)
    {
        $data = $this->getBookmarkResources();

        $bookmarkCategories = $data['bookmark_categories'];
        $bookmarks = $data['bookmarks'];

        $userBookmarkCategories = $this->createUserBookmarkCategories($guestUser, $bookmarkCategories);
        $this->createUserBookmarks($guestUser, $bookmarks, $userBookmarkCategories);
    }

    protected function createUserBookmarkCategories(GuestUser $guestUser, array $bookmarkCategories): array
    {
        $userBookmarkCategories = [];

        foreach ($bookmarkCategories as $bookmarkCategory) {
            $type = $bookmarkCategory['type'];

            $userBookmarkCategory = $this->bookmarkCategoryRepository->add([
                'guest_user_id' => $guestUser->id,
                'name' => $bookmarkCategory['name']
            ]);

            $userBookmarkCategories[$type] = $userBookmarkCategory;
        }
        return $userBookmarkCategories;
    }

    protected function createUserBookmarks(GuestUser $guestUser, array $bookmarks, array $userBookmarkCategories)
    {
        foreach ($bookmarks as $bookmark) {
            $userBookmarkCategory = $userBookmarkCategories[$bookmark['type']];

            $this->bookmarkRepository->add([
                'guest_user_id' => $guestUser->id,
                'bookmark_category_id' => $userBookmarkCategory->id,
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
}
