<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Page;
use App\Services\ContactService;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService, private SeoService $seoService)
    {
    }

    public function create(): View
    {
        $page = Page::published()->where('slug', 'kontak')->first();

        $this->seoService->apply($page?->seoMetadata, [
            'title' => 'Hubungi Kami - CV Devgenfour',
            'description' => 'Terhubung dengan tim CV Devgenfour untuk konsultasi proyek digital Anda.',
        ]);

        return view('frontend.contact', [
            'page' => $page,
            'whatsapp_number' => config('company.whatsapp'),
        ]);
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $this->contactService->handle($request->validated());

        return redirect()->route('contact.create')->with('status', 'Pesan berhasil dikirim. Kami akan menghubungi Anda dalam 1x24 jam.');
    }
}
