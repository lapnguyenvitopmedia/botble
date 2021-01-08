<?php

return [
    [
        'name' => 'Revsliders',
        'flag' => 'revslider.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'revslider.create',
        'parent_flag' => 'revslider.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'revslider.edit',
        'parent_flag' => 'revslider.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'revslider.destroy',
        'parent_flag' => 'revslider.index',
    ],
];
