<?php

return [
        'menus' => [
            [
                'id' => 1,
                'slug' => 'main-menu',
                'location' => 'header',
                'title' => 'Main Menu',
                'is_activated' => 1,
            ],
            [
                'id' => 2,
                'slug' => 'footer-menu',
                'location' => 'footer',
                'title' => 'Footer Menu',
                'is_activated' => 1,
            ],
            [
                'id' => 3,
                'slug' => 'social-share-menu',
                'location' => 'footer',
                'title' => 'Social Share Menu',
                'is_activated' => 1,
            ],
            [
                'id' => 4,
                'slug' => 'user-menu',
                'location' => 'header',
                'title' => 'User Dropdown Menu',
                'is_activated' => 1,
            ],
        ],
        'items' => [
            'main-menu' => [
                [
                    'title' => 'Dashboard',
                    'slug' => 'dashboard',
                    'url' => '/dashboard',
                    'route' => 'filament.admin.pages.dashboard',
                    'icon' => 'fas-gauge',
                    'target' => null,
                    'help_text' => 'My Dashboard',
                    'is_activated' => true,
                ],
                [
                    'title' => 'About',
                    'slug' => 'about',
                    'url' => '/about',
                    'target' => null,
                    'help_text' => 'About Us',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Quotes',
                    'slug' => 'quotes',
                    'url' => '/quotes',
                    'target' => null,
                    'help_text' => 'Request A Quote',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Contact',
                    'slug' => 'contact',
                    'url' => '/contact',
                    'target' => null,
                    'help_text' => 'Contact Us',
                    'is_activated' => true,
                ],
            ],
            'footer-menu' => [
                [
                    'title' => 'Terms of Service',
                    'slug' => 'terms-of-service',
                    'url' => '/terms-of-service',
                    'route' => null,
                    'icon' => null,
                    'target' => null,
                    'help_text' => 'Our Terms of Service',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Privacy Policy',
                    'slug' => 'privacy-policy',
                    'url' => '/privacy-policy',
                    'route' => null,
                    'icon' => null,
                    'target' => null,
                    'help_text' => 'Your Rights To Privacy',
                    'is_activated' => true,
                ],
                // ... add the other footer items here
            ],
            'user-menu' => [
                [
                    'title' => 'Dashboard',
                    'slug' => 'dashboard',
                    'url' => '/dashboard',
                    'route' => null,
                    'icon' => 'fas-gauge',
                    'target' => null,
                    'help_text' => 'My Dashboard',
                    'is_activated' => true,
                ],
                // ... add the other user items here
            ],
            'social-share-menu' => [
                [
                    'title' => 'Facebook',
                    'slug' => 'facebook',
                    'url' => 'https://facebook.com/',
                    'route' => null,
                    'icon' => 'fab-facebook',
                    'target' => 1,
                    'help_text' => 'Follow us on Facebook',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Instagram',
                    'slug' => 'instagram',
                    'url' => 'https://instagram.com/',
                    'route' => null,
                    'icon' => 'fab-instagram',
                    'target' => 1,
                    'help_text' => 'Follow us on Instagram',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Twitter',
                    'slug' => 'twitter',
                    'url' => 'https://twitter.com/',
                    'route' => null,
                    'icon' => 'fab-twitter',
                    'target' => 1,
                    'help_text' => 'Follow us on Twitter',
                    'is_activated' => true,
                ],
                [
                    'title' => 'Youtube',
                    'slug' => 'youtube',
                    'url' => 'https://youtube.com/',
                    'route' => null,
                    'icon' => 'fab-youtube',
                    'target' => 1,
                    'help_text' => 'Follow us on Youtube',
                    'is_activated' => true,
                ],
            ],
        ]
    ];