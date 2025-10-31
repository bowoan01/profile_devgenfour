<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PageController extends Controller
{
    public function __construct(private SeoService $seoService)
    {
    }

    public function show(string $slug): View|Response
    {
        $page = Page::published()->where('slug', $slug)->firstOrFail();

        $this->seoService->apply(
            $page->seoMetadata,
            [
                'title' => $page->title,
                'description' => strip_tags(str($page->content)->limit(160)),
            ]
        );

        return view('frontend.page', compact('page'));
    }
}
