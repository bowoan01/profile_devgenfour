<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct(private SeoService $seoService)
    {
    }

    public function index(Request $request): View
    {
        $query = Portfolio::published()->with('services');

        if ($serviceSlug = $request->query('service')) {
            $query->whereHas('services', fn ($q) => $q->where('slug', $serviceSlug));
        }

        $portfolios = $query->latest('project_date')->paginate(9)->withQueryString();

        $this->seoService->apply(null, [
            'title' => 'Portofolio Proyek - CV Devgenfour',
            'description' => 'Kumpulan studi kasus pengembangan aplikasi dari CV Devgenfour.',
        ]);

        return view('frontend.portfolios.index', compact('portfolios'));
    }

    public function show(string $slug): View
    {
        $portfolio = Portfolio::published()->with(['services', 'images'])->where('slug', $slug)->firstOrFail();

        $this->seoService->apply($portfolio->seoMetadata, [
            'title' => $portfolio->title,
            'description' => strip_tags(str($portfolio->summary ?? $portfolio->body)->limit(160)),
        ]);

        return view('frontend.portfolios.show', compact('portfolio'));
    }
}
