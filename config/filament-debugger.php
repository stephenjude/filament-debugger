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
];
