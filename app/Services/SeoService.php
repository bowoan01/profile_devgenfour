<?php

namespace App\Services;

use App\Models\SeoMetadata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Spatie\LaravelSeo\Facades\Seo;

class SeoService
{
    public function forRoute(string $routeName): ?SeoMetadata
    {
        return SeoMetadata::where('route_name', $routeName)->first();
    }

    public function forModel(Model $model): ?SeoMetadata
    {
        return $model->seoMetadata ?? SeoMetadata::where('seoable_type', $model::class)
            ->where('seoable_id', $model->getKey())
            ->first();
    }

    public function apply(?SeoMetadata $metadata, array $overrides = []): void
    {
        Seo::reset();

        if (! $metadata) {
            if ($title = Arr::get($overrides, 'title')) {
                Seo::title($title);
            }

            if ($description = Arr::get($overrides, 'description')) {
                Seo::description($description);
            }

            if ($canonical = Arr::get($overrides, 'canonical', URL::current())) {
                Seo::canonical($canonical);
            }

            return;
        }

        if ($metadata->title) {
            Seo::title($metadata->title);
        }

        if ($metadata->description) {
            Seo::description($metadata->description);
        }

        Seo::canonical(Arr::get($overrides, 'canonical', URL::current()));

        if ($metadata->keywords) {
            Seo::meta('keywords', $metadata->keywords);
        }

        if ($metadata->og_image) {
            Seo::openGraph('image', $metadata->og_image);
            Seo::twitter('image', $metadata->og_image);
        }

        foreach ((array) $metadata->extras as $name => $value) {
            Seo::meta($name, $value);
        }
    }

    public function updateOrCreate(array $attributes, array $values): SeoMetadata
    {
        return SeoMetadata::updateOrCreate($attributes, $values);
    }
}
