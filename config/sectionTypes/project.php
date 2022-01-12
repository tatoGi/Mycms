<?php
return [
    'id' => 5,
    'type' => 4,
    'folder' => 'news',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'keywords' => [
                'type' => 'keywords',
                'reqired' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'desc' => [
                'type' => 'textarea',

            ],
			'text' => [
                'type' => 'textarea',

            ],
            'active' => [
                'type' => 'checkbox',
            ],
        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],



        ],




    ]

];
