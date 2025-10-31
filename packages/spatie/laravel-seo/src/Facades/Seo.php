<?php

namespace Spatie\LaravelSeo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Spatie\LaravelSeo\Support\SeoManager reset()
 * @method static \Spatie\LaravelSeo\Support\SeoManager title(string $title)
 * @method static \Spatie\LaravelSeo\Support\SeoManager description(string $description)
 * @method static \Spatie\LaravelSeo\Support\SeoManager canonical(?string $url)
 * @method static \Spatie\LaravelSeo\Support\SeoManager meta(string $name, string $content)
 * @method static \Spatie\LaravelSeo\Support\SeoManager openGraph(string $property, string $content)
 * @method static \Spatie\LaravelSeo\Support\SeoManager twitter(string $property, string $content)
 * @method static \Spatie\LaravelSeo\Support\SeoManager structuredData(array $data)
 * @method static string render()
 */
class Seo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'seo';
    }
}
