<?php

namespace Botble\Revslider\Models;

use Botble\Base\Models\BaseModel;

class Revslider extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revslider_sliders';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'alias',
        'params',
        'settings',
        'type'
    ];

}
