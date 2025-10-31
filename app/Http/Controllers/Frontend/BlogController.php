<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function __construct(private SeoService $seoService)
    {
    }

    public function index(): View
    {
        $posts = BlogPost::published()->latest('published_at')->paginate(9);

        $this->seoService->apply(null, [
            'title' => 'Blog Teknologi - CV Devgenfour',
            'description' => 'Insight teknologi, tips pengembangan, dan kabar terbaru dari CV Devgenfour.',
        ]);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = BlogPost::published()->with('author')->where('slug', $slug)->firstOrFail();

        $this->seoService->apply($post->seoMetadata, [
            'title' => $post->title,
            'description' => strip_tags(str($post->excerpt ?? $post->content)->limit(160)),
        ]);

        return view('frontend.blog.show', compact('post'));
    }
}
