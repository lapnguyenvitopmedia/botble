<?php

namespace Botble\Banners\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Banners\Repositories\Interfaces\BannersInterface;

class BannersCacheDecorator extends CacheAbstractDecorator implements BannersInterface
{
    public function getAllSlider()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
