<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class SampleContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Pengembangan Web Kustom',
                'slug' => 'web-development',
                'icon' => 'bi-globe',
                'excerpt' => 'Rancang dan bangun aplikasi web modern dengan standar keamanan tinggi.',
                'description' => '<p>Kami mengembangkan aplikasi web yang responsif, terukur, dan aman menggunakan teknologi terbaru.</p>',
                'order_column' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Aplikasi Mobile',
                'slug' => 'mobile-app',
                'icon' => 'bi-phone',
                'excerpt' => 'Solusi Android dan iOS native maupun cross-platform.',
                'description' => '<p>Dari MVP hingga enterprise, kami menghadirkan aplikasi mobile dengan UX terbaik.</p>',
                'order_column' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Integrasi IoT',
                'slug' => 'iot-integration',
                'icon' => 'bi-cpu',
                'excerpt' => 'Monitor dan otomasi perangkat pintar dengan platform IoT terpadu.',
                'description' => '<p>Kami menghubungkan perangkat IoT dengan dashboard analitik dan automasi real-time.</p>',
                'order_column' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        Page::updateOrCreate(
            ['slug' => 'tentang-kami'],
            [
                'title' => 'Tentang CV Devgenfour',
                'status' => 'published',
                'template' => 'default',
                'content' => '<p>CV Devgenfour berdiri pada tahun 2022 dan berfokus pada solusi perangkat lunak yang berdampak bagi bisnis.</p><p>Kami menggabungkan riset, desain, dan teknologi untuk menghasilkan produk digital yang human-centric.</p>',
            ]
        );

        $portfolio = Portfolio::updateOrCreate(
            ['slug' => 'platform-edutech-learningone'],
            [
                'title' => 'Platform EduTech LearningOne',
                'client_name' => 'LearningOne',
                'project_date' => now()->subMonths(4),
                'summary' => 'Platform pendidikan daring untuk pelatihan korporasi dengan streaming interaktif.',
                'body' => '<p>Devgenfour mengembangkan LearningOne dengan arsitektur microservice, video streaming adaptif, dan integrasi pembayaran.</p><ul><li>Integrasi LMS & HRIS</li><li>Dashboard analitik real-time</li><li>Aplikasi mobile untuk peserta</li></ul>',
                'is_published' => true,
            ]
        );
        $portfolio->services()->sync(Service::pluck('id')->all());

        $teamMembers = [
            ['name' => 'Sofyan Maulana', 'position' => 'CEO & CTO', 'order_column' => 1, 'is_active' => true],
            ['name' => 'Nur Aisyah', 'position' => 'Lead Product Designer', 'order_column' => 2, 'is_active' => true],
            ['name' => 'Andre Wibowo', 'position' => 'Head of Engineering', 'order_column' => 3, 'is_active' => true],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }

        $testimonials = [
            [
                'name' => 'Agus Santoso',
                'title' => 'CTO',
                'company' => 'PT Nusantara Tech',
                'rating' => 5,
                'message' => 'Devgenfour cepat memahami kebutuhan kami dan menghadirkan platform stabil dengan dukungan penuh.',
                'is_active' => true,
                'order_column' => 1,
            ],
            [
                'name' => 'Laras Pertiwi',
                'title' => 'Product Manager',
                'company' => 'LearningOne',
                'rating' => 5,
                'message' => 'Kolaborasi yang sangat profesional, tim Devgenfour selalu responsif dan proaktif.',
                'is_active' => true,
                'order_column' => 2,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate([
                'name' => $testimonial['name'],
                'company' => $testimonial['company'],
            ], $testimonial);
        }

        BlogPost::updateOrCreate(
            ['slug' => 'mengapa-bisnis-butuh-transformasi-digital'],
            [
                'author_id' => \App\Models\User::first()?->id ?? 1,
                'title' => 'Mengapa Bisnis Anda Membutuhkan Transformasi Digital',
                'excerpt' => 'Transformasi digital tidak lagi opsional. Berikut alasan dan langkah praktis memulainya.',
                'content' => '<p>Transformasi digital memungkinkan bisnis merespon perubahan dengan lebih lincah.</p><p>Mulailah dengan memetakan proses inti, memilih teknologi yang tepat, dan membangun budaya kolaboratif.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ]
        );
    }
}
