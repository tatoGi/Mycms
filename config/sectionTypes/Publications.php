<?php
return [
    'id' => 4,
    'type' => 3,
    'folder' => 'publications',
	'paginate' => 12,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
			'text' => [
                'type' => 'textarea',
            ],
            'publications' => [
				'type' => 'file'
			],
            'active' => [
                'type' => 'checkbox',
            ],

        ],

        'nonTrans' => [

            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],



        ],




    ]

];
