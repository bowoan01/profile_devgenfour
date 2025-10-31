<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function __construct(private SeoService $seoService)
    {
    }

    public function __invoke(string $slug = null): View
    {
        if ($slug) {
            $service = Service::active()->where('slug', $slug)->firstOrFail();
            $this->seoService->apply($service->seoMetadata, [
                'title' => $service->title,
                'description' => strip_tags(str($service->description)->limit(160)),
            ]);

            return view('frontend.services.show', compact('service'));
        }

        $services = Service::active()->get();
        $this->seoService->apply(null, [
            'title' => 'Layanan Kami - CV Devgenfour',
            'description' => 'Jelajahi layanan pengembangan Web, Mobile, dan IoT dari CV Devgenfour.',
        ]);

        return view('frontend.services.index', compact('services'));
    }
}
