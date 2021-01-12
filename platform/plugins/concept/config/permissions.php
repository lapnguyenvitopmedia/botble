<?php

return [
    [
        'name' => 'Concepts',
        'flag' => 'concept.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'concept.create',
        'parent_flag' => 'concept.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'concept.edit',
        'parent_flag' => 'concept.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'concept.destroy',
        'parent_flag' => 'concept.index',
    ],
];
