<?php

return [
    'add_album' => [
        'title' => 'Add new Album by company :company',
        'body' => 'Add company :company new album with name :album',
    ],
    'destroy_album' => [
        'title' => ' Delete album by Company :company ',
        'body' => 'Album :album was deleted by company :company',
    ],
    'artist' => [
        'store' => [
            'title' => 'Add new Artist by company :company',
            'body' => ' Artist was add with name :artist by company :company',
        ],
        'destroy' => [
            'title' => 'Delete new Artist by company :company',
            'body' => ' Artist was Deleted with name :artist by company :company',
        ],
    ],
    'music' => [
        'store' => [
            'title' => 'the company :company add media',
            'body' => 'the company :company add media with name :music'
        ],
        'store' => [
            'title' => 'the company :company delete media',
            'body' => 'the company :company delete media with name :music'
        ]
    ]
];
