<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::with('author')->latest()->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.blog.create');
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['author_id'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('blog', 'public');
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Artikel berhasil ditambahkan.');
    }

    public function edit(BlogPost $blog_post): View
    {
        return view('admin.blog.edit', ['post' => $blog_post]);
    }

    public function update(BlogPostRequest $request, BlogPost $blog_post): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            if ($blog_post->thumbnail) {
                Storage::disk('public')->delete($blog_post->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('blog', 'public');
        }

        $blog_post->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(BlogPost $blog_post): RedirectResponse
    {
        if ($blog_post->thumbnail) {
            Storage::disk('public')->delete($blog_post->thumbnail);
        }

        $blog_post->delete();

        return redirect()->route('admin.blog-posts.index')->with('status', 'Artikel berhasil dihapus.');
    }
}
