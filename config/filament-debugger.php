<?php

return [
    'debuggers' => [
        'horizon',
        'telescope',
    ],

    'authorization' => false,

    'permissions' => [
        'horizon' => 'horizon.view',
        'telescope' => 'telescope.view',
    ],

    'group' => 'Debugger',

    'url' => [
        'horizon' => env('HORIZON_PATH', 'horizon'),
        'telescope' => env('TELESCOPE_PATH', 'telescope'),
    ],
];
