<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    BookmarkCategory,
    Bookmark
};

class BookmarkSeeder extends Seeder
{
    protected const BOOKMARK_CATEGORIES = [
        ['name' => 'Social Network', 'type' => 'social-network'],
        ['name' => 'Streaming',      'type' => 'streaming'],
        ['name' => 'eCommerce',      'type' => 'ecommerce']
    ];

    protected const BOOKMARKS = [
        ['name' => 'Facebook', 'type' => 'social-network',  'url' => 'https://www.facebook.com'],
        ['name' => 'Twitter', 'type' => 'social-network',  'url' => 'https://www.twitter.com'],
        ['name' => 'TikTok', 'type' => 'social-network',  'url' => 'https://www.tiktok.com'],
        ['name' => 'Netflix', 'type' => 'streaming',  'url' => 'https://www.netflix.com'],
        ['name' => 'Twitch', 'type' => 'streaming',  'url' => 'https://www.twitch.tv'],
        ['name' => 'YouTube', 'type' => 'streaming',  'url' => 'https://www.youtube.com'],
        ['name' => 'Amazon', 'type' => 'ecommerce',  'url' => 'https://www.amazon.com'],
        ['name' => 'eBay', 'type' => 'ecommerce',  'url' => 'https://www.ebay.com'],
    ];

    public function run()
    {
        $categoryIds = $this->createCategories();
        $this->createBookmarks($categoryIds);
    }

    protected function createCategories(): array
    {
        $categoryIds = [];

        foreach (self::BOOKMARK_CATEGORIES as $category) {
            $name = $category['name'];
            $type = $category['type'];

            $category = BookmarkCategory::create(['name' => $name]);
            $categoryIds[$type] = $category->id;
        }
        return $categoryIds;
    }

    protected function createBookmarks(array $categoryIds): void
    {
        foreach (self::BOOKMARKS as $bookmark) {
            $type       = $bookmark['type'];
            $categoryId = $categoryIds[$type];

            $bookmark = Bookmark::create([
                'bookmark_category_id' => $categoryId,
                'name'                 => $bookmark['name'],
                'url'                  => $bookmark['url']
            ]);
        }
    }
}
