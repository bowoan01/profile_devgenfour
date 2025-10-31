<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(private SeoService $seoService)
    {
    }

    public function index(): View
    {
        $page = Page::where('slug', 'beranda')->orWhere('slug', 'home')->published()->first();

        $services = Service::active()->take(6)->get();
        $portfolios = Portfolio::published()->latest('project_date')->take(6)->get();
        $testimonials = Testimonial::active()->take(6)->get();
        $teamMembers = TeamMember::active()->take(6)->get();
        $blogPosts = BlogPost::published()->latest('published_at')->take(3)->get();

        $this->seoService->apply(
            $page?->seoMetadata,
            [
                'title' => 'CV Devgenfour - Solusi Digital Profesional',
                'description' => 'Partner teknologi untuk pengembangan aplikasi Web, Mobile, dan IoT.',
            ]
        );

        return view('frontend.home', [
            'page' => $page,
            'services' => $services,
            'portfolios' => $portfolios,
            'testimonials' => $testimonials,
            'teamMembers' => $teamMembers,
            'blogPosts' => $blogPosts,
        ]);
    }
}
