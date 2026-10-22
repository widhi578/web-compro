<?php

return [
    // Every local browser-facing resource must be registered here before use.
    'resources' => [
        'public-styles' => ['path' => 'css/styles.css', 'as' => 'style'],
        'admin-styles' => ['path' => 'css/admin.css', 'as' => 'style'],
        'public-scripts' => ['path' => 'js/scripts.js', 'as' => 'script'],
        'admin-scripts' => ['path' => 'js/admin-editor.js', 'as' => 'script'],
        'whatsapp-icon' => ['path' => 'assets/whatsapp.png', 'as' => 'image'],
        'site-favicon' => ['path' => 'assets/travel-indo-favicon.svg', 'as' => 'image'],
    ],

    'fonts' => [
        'primary' => [
            'stylesheet' => 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap',
        ],
    ],

    'preconnects' => [
        ['href' => 'https://fonts.googleapis.com', 'crossorigin' => false],
        ['href' => 'https://fonts.gstatic.com', 'crossorigin' => true],
    ],
];
