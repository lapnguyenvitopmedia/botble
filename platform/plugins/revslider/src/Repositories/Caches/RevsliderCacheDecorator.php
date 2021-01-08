<?php

namespace Botble\Revslider\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Revslider\Repositories\Interfaces\RevsliderInterface;

class RevsliderCacheDecorator extends CacheAbstractDecorator implements RevsliderInterface
{
    public function getSliders()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
