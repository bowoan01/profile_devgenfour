<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoMetadataRequest;
use App\Models\SeoMetadata;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SeoMetadataController extends Controller
{
    public function index(): View
    {
        $records = SeoMetadata::with('seoable')->latest()->paginate(20);

        return view('admin.seo.index', compact('records'));
    }

    public function create(): View
    {
        return view('admin.seo.create');
    }

    public function store(SeoMetadataRequest $request): RedirectResponse
    {
        $data = $this->prepareData($request);
        SeoMetadata::create($data);

        return redirect()->route('admin.seo-metadata.index')->with('status', 'Metadata SEO berhasil dibuat.');
    }

    public function edit(SeoMetadata $seo_metadata): View
    {
        return view('admin.seo.edit', ['record' => $seo_metadata]);
    }

    public function update(SeoMetadataRequest $request, SeoMetadata $seo_metadata): RedirectResponse
    {
        $data = $this->prepareData($request, $seo_metadata);
        $seo_metadata->update($data);

        return redirect()->route('admin.seo-metadata.index')->with('status', 'Metadata SEO berhasil diperbarui.');
    }

    public function destroy(SeoMetadata $seo_metadata): RedirectResponse
    {
        if ($seo_metadata->og_image) {
            Storage::disk('public')->delete($seo_metadata->og_image);
        }

        $seo_metadata->delete();

        return redirect()->route('admin.seo-metadata.index')->with('status', 'Metadata SEO berhasil dihapus.');
    }

    private function prepareData(SeoMetadataRequest $request, ?SeoMetadata $metadata = null): array
    {
        $data = $request->validated();

        if ($request->hasFile('og_image')) {
            if ($metadata?->og_image) {
                Storage::disk('public')->delete($metadata->og_image);
            }

            $data['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        $data['route_name'] = $request->input('route_name');
        $data['seoable_type'] = $request->input('seoable_type');
        $data['seoable_id'] = $request->input('seoable_id');
        if (array_key_exists('extras', $data) && is_string($data['extras'])) {
            $decoded = json_decode($data['extras'], true);
            $data['extras'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        if (! array_key_exists('extras', $data)) {
            $data['extras'] = null;
        }

        return $data;
    }
}
