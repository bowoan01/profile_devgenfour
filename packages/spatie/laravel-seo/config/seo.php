<?php

return [
    'defaults' => [
        'title' => config('app.name', 'Laravel'),
        'description' => 'Perusahaan pengembang perangkat lunak dengan layanan Web, Mobile, dan IoT.',
        'canonical' => null,
        'meta' => [
            'og:type' => 'website',
            'og:locale' => 'id_ID',
        ],
        'structured_data' => [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => config('app.name', 'Laravel'),
                'url' => config('app.url'),
                'logo' => config('app.url').'/images/logo.png',
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'contactType' => 'customer service',
                    'email' => config('mail.from.address'),
                ],
            ],
        ],
    ],
];
