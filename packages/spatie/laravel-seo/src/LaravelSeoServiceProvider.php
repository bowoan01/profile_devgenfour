<?php

namespace Spatie\LaravelSeo;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelSeo\Support\SeoManager;

class LaravelSeoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/seo.php', 'seo');

        $this->app->singleton(SeoManager::class, function () {
            return new SeoManager(Config::get('seo.defaults', []));
        });

        $this->app->alias(SeoManager::class, 'seo');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/seo.php' => config_path('seo.php'),
        ], 'config');

        View::composer('*', function ($view) {
            /** @var SeoManager $manager */
            $manager = app(SeoManager::class);
            $view->with('seo', $manager);
        });

        Blade::directive('seo', function () {
            return "<?php echo app('seo')->render(); ?>";
        });
    }
}
