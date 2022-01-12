<?php
return [
    'id' => 6,
    'type' => 5,
    'folder' => 'contact',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],

        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],
        ],




    ]
];
