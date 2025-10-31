<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::with('services')->latest()->paginate(15);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create(): View
    {
        $services = Service::orderBy('title')->pluck('title', 'id');

        return view('admin.portfolios.create', compact('services'));
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $serviceIds = $data['service_ids'] ?? [];
        unset($data['service_ids'], $data['gallery']);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('portfolios', 'public');
        }

        $portfolio = Portfolio::create($data);
        $portfolio->services()->sync($serviceIds);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $image) {
                $path = $image->store('portfolios/gallery', 'public');
                $portfolio->images()->create([
                    'path' => $path,
                    'order_column' => $index,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('status', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio): View
    {
        $portfolio->load('images', 'services');
        $services = Service::orderBy('title')->pluck('title', 'id');

        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->validated();
        $serviceIds = $data['service_ids'] ?? [];
        unset($data['service_ids'], $data['gallery']);

        if ($request->hasFile('featured_image')) {
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')->store('portfolios', 'public');
        }

        $portfolio->update($data);
        $portfolio->services()->sync($serviceIds);

        if ($request->hasFile('gallery')) {
            foreach ($portfolio->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }

            foreach ($request->file('gallery') as $index => $image) {
                $path = $image->store('portfolios/gallery', 'public');
                $portfolio->images()->create([
                    'path' => $path,
                    'order_column' => $index,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('status', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        if ($portfolio->featured_image) {
            Storage::disk('public')->delete($portfolio->featured_image);
        }

        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('status', 'Portofolio berhasil dihapus.');
    }
}
