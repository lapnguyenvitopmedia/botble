<?php

namespace Botble\Banners\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Banners extends BaseModel
{
    use EnumCastable;

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
        'id',
        'title',
        'alias',
        'params',
        'settings',
        'type',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
