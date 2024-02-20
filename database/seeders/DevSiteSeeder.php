<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    SiteCategory,
    Site
};

class DevSiteSeeder extends Seeder
{
    protected const DEV_SITE_CATEGORIES = [
        ['name' => 'Cloud services',               'type' => 'cloud'],
        ['name' => 'Javascript libs / frameworks', 'type' => 'js'],
        ['name' => 'Mobile SDKs',                  'type' => 'mobile'],
        ['name' => 'PHP frameworks',               'type' => 'php']
    ];

    protected const DEV_SITES = [
        ['name' => 'Amazon AWS',      'type' => 'cloud',  'url' => 'https://aws.amazon.com',        'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Microsoft Azure', 'type' => 'cloud',  'url' => 'https://azure.microsoft.com',   'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Google Cloud',    'type' => 'cloud',  'url' => 'https://cloud.google.com',      'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Firebase',        'type' => 'cloud',  'url' => 'https://firebase.google.com',   'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Heroku',          'type' => 'cloud',  'url' => 'https://www.heroku.com',        'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Vercel',          'type' => 'cloud',  'url' => 'https://vercel.com',            'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Netlify',         'type' => 'cloud',  'url' => 'https://www.netlify.com',       'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Cloudflare',      'type' => 'cloud',  'url' => 'https://www.cloudflare.com',    'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Appwrite',        'type' => 'cloud',  'url' => 'https://appwrite.io',           'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Laravel',         'type' => 'php',    'url' => 'https://laravel.com',           'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Symfony',         'type' => 'php',    'url' => 'https://symfony.com',           'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Slim',            'type' => 'php',    'url' => 'https://www.slimframework.com', 'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'CakePHP',         'type' => 'php',    'url' => 'https://cakephp.org',           'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'React',           'type' => 'js',     'url' => 'https://react.dev',             'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Vue.js',          'type' => 'js',     'url' => 'https://vuejs.org',             'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Svelte',          'type' => 'js',     'url' => 'https://svelte.dev',            'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'React Native',    'type' => 'mobile', 'url' => 'https://reactnative.dev',       'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Flutter',         'type' => 'mobile', 'url' => 'https://flutter.dev',           'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
        ['name' => 'Iconic',          'type' => 'mobile', 'url' => 'https://ionicframework.com',    'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/amazon.png'],
    ];

    protected const PHP_SITE_CATEGORIES = [
        ['name' => 'Frameworks',                 'type' => 'framework'],
        ['name' => 'Content management systems', 'type' => 'cms'],
        ['name' => 'E-commerce',                 'type' => 'shop']
    ];

    protected const PHP_SITES = [
        ['name' => 'Laravel',      'type' => 'framework',  'url' => 'https://laravel.com',                                               'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/laravel.png'],
        ['name' => 'Symfony',      'type' => 'framework',  'url' => 'https://symfony.com',                                               'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/symfony.png'],
        ['name' => 'CodeIgniter',  'type' => 'framework',  'url' => 'https://www.codeigniter.com',                                       'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/codeigniter.png'],
        ['name' => 'CakePHP',      'type' => 'framework',  'url' => 'https://cakephp.org',                                               'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/cakephp.png'],
        ['name' => 'Wordpress',    'type' => 'cms',        'url' => 'https://en-gb.wordpress.org',                                       'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/wordpress.png'],
        ['name' => 'Drupal',       'type' => 'cms',        'url' => 'https://www.drupal.org',                                            'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/drupal.png'],
        ['name' => 'Magento',      'type' => 'shop',       'url' => 'https://business.adobe.com/products/magento/magento-commerce.html', 'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/magento.png'],
        ['name' => 'OpenCart',     'type' => 'shop',       'url' => 'https://www.opencart.com',                                          'image_url' => 'https://requiredev.s3.eu-west-2.amazonaws.com/devsites/opencart.png'],
    ];

    public function run()
    {
        $siteCategoryIds = $this->createSiteCategories();
        $this->createSites($siteCategoryIds);
    }

    protected function createSiteCategories(): array
    {
        $siteCategoryIds = [];

        foreach (self::PHP_SITE_CATEGORIES as $siteCategory) {
            $name = $siteCategory['name'];
            $type = $siteCategory['type'];

            $siteCategory = SiteCategory::create(['name' => $name]);
            $siteCategoryIds[$type] = $siteCategory->id;
        }
        return $siteCategoryIds;
    }

    protected function createSites(array $siteCategoryIds): void
    {
        foreach (self::PHP_SITES as $site) {
            $type           = $site['type'];
            $siteCategoryId = $siteCategoryIds[$type];

            $site = Site::create([
                'site_category_id' => $siteCategoryId,
                'name'             => $site['name'],
                'url'              => $site['url'],
                'image_url'        => $site['image_url']
            ]);
        }
    }
}
