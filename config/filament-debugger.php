<?php

return [
    'debuggers' => [
        'horizon',
        'telescope',
    ],

    'authorization' => true,

    'permissions' => [
        'horizon' => 'horizon.view',
        'telescope' => 'telescope.view',
    ],

    'group' => 'Debugger',
];
