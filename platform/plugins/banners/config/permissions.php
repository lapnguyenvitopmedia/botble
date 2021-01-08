<?php

return [
    [
        'name' => 'Banners',
        'flag' => 'banners.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'banners.create',
        'parent_flag' => 'banners.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'banners.edit',
        'parent_flag' => 'banners.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'banners.destroy',
        'parent_flag' => 'banners.index',
    ],
];
