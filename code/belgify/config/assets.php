<?php

return [

    'images'    =>  [

        'paths' => [
            'input'     =>  public_path().'/uploads',
            'output'    =>  public_path().'/uploads',
        ],

        'sizes' => [

            'small' => [
                'width' => 300,
            ],

            'medium' => [
                'width' => 500,
            ],
            'big'   =>  [
                'width'     =>  1000,
            ]
        ]
    ]

];