<?php

return [
    'add_album' => [
        'title' => ':company تم اضافة اللبوم بواسطة',
        'body' => '  باسم :album  :company تم اضافة اللبوم بواسطة الشركة',
    ],
    'destroy_album' => [
        'title' => ' :company  تم حذف الالبوم بواسطة الشركة   ',
        'body' => '  :company تم حذف اللبوم باسم :album بواسطة الشركة',
    ],
    'artist' => [
        'store' => [
            'title' => 'تم اضافة فنان بواسطة الشركة :company',
            'body' => ' تم اضافة فنان باسم :artist  بواسطة الشركة :company'
        ],
        'destroy' => [
            'title' => 'تم حذف فنان بواسطة الشركة :company',
            'body' => ' تم حذف فنان باسم :artist  بواسطة الشركة :company'
        ],
    ],
    'music' => [
        'store' => [
            'title' => 'باضافة مسجل :company قامت الشركة ',
            'body' => ':music باضافة مسجل باسم :company قامت الشركة',
        ],
        'destroy' => [
            'title' => 'باحذف مسجل :company قامت الشركة ',
            'body' => ':music باحذف مسجل باسم :company قامت الشركة',
        ]
    ]
];
