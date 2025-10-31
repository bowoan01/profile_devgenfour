<?php

return [
    'defaults' => [
        'title' => 'CV Devgenfour - Solusi Digital Profesional',
        'description' => 'CV Devgenfour adalah software house yang menyediakan layanan pengembangan Web, Mobile, dan IoT terpercaya.',
        'canonical' => env('APP_URL'),
        'meta' => [
            'og:type' => 'website',
            'og:locale' => 'id_ID',
            'twitter:card' => 'summary_large_image',
        ],
        'structured_data' => [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'CV Devgenfour',
                'url' => env('APP_URL'),
                'logo' => env('APP_URL').'/images/logo.png',
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'contactType' => 'customer service',
                    'telephone' => '+62 852-1234-5678',
                    'email' => 'hello@devgenfour.com',
                    'areaServed' => 'ID'
                ],
            ],
        ],
    ],
];
