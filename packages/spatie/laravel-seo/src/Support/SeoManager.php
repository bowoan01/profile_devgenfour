<?php

namespace Spatie\LaravelSeo\Support;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SeoManager implements Htmlable
{
    protected array $defaults;

    protected ?string $title = null;

    protected ?string $description = null;

    protected ?string $canonical = null;

    protected array $meta = [];

    protected array $structuredData = [];

    public function __construct(array $defaults = [])
    {
        $this->defaults = $defaults;
        $this->reset();
    }

    public function reset(): self
    {
        $this->title = $this->defaults['title'] ?? null;
        $this->description = $this->defaults['description'] ?? null;
        $this->canonical = $this->defaults['canonical'] ?? null;
        $this->meta = $this->defaults['meta'] ?? [];
        $this->structuredData = $this->defaults['structured_data'] ?? [];

        return $this;
    }

    public function title(string $title): self
    {
        $this->title = Str::of($title)->trim()->value();

        return $this;
    }

    public function description(string $description): self
    {
        $this->description = Str::of($description)->trim()->value();

        return $this;
    }

    public function canonical(?string $url): self
    {
        $this->canonical = $url ? Str::of($url)->trim()->value() : null;

        return $this;
    }

    public function meta(string $name, string $content): self
    {
        $this->meta[$name] = $content;

        return $this;
    }

    public function openGraph(string $property, string $content): self
    {
        $this->meta['og:'.$property] = $content;

        return $this;
    }

    public function twitter(string $property, string $content): self
    {
        $this->meta['twitter:'.$property] = $content;

        return $this;
    }

    public function structuredData(array $data): self
    {
        $this->structuredData[] = $data;

        return $this;
    }

    public function toCollection(): Collection
    {
        return Collection::make([
            'title' => $this->title,
            'description' => $this->description,
            'canonical' => $this->canonical,
            'meta' => $this->meta,
            'structured_data' => $this->structuredData,
        ]);
    }

    public function render(): string
    {
        $collection = $this->toCollection();
        $html = [];

        if ($title = $collection->get('title')) {
            $html[] = '<title>'.e($title).'</title>';
            $html[] = '<meta property="og:title" content="'.e($title).'">';
        }

        if ($description = $collection->get('description')) {
            $html[] = '<meta name="description" content="'.e($description).'">';
            $html[] = '<meta property="og:description" content="'.e($description).'">';
        }

        if ($canonical = $collection->get('canonical')) {
            $html[] = '<link rel="canonical" href="'.e($canonical).'">';
        }

        foreach ($collection->get('meta', []) as $name => $content) {
            if (str_starts_with($name, 'og:')) {
                $html[] = '<meta property="'.e($name).'" content="'.e($content).'">';
                continue;
            }

            if (str_starts_with($name, 'twitter:')) {
                $html[] = '<meta name="'.e($name).'" content="'.e($content).'">';
                continue;
            }

            $html[] = '<meta name="'.e($name).'" content="'.e($content).'">';
        }

        foreach ($collection->get('structured_data', []) as $block) {
            $html[] = '<script type="application/ld+json">'.json_encode($block, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).'</script>';
        }

        return implode(PHP_EOL, $html);
    }

    public function toHtml()
    {
        return $this->render();
    }

    public function __toString(): string
    {
        return $this->render();
    }
}
