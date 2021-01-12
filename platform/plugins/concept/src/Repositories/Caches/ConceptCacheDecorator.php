<?php

namespace Botble\Concept\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Concept\Repositories\Interfaces\ConceptInterface;

class ConceptCacheDecorator extends CacheAbstractDecorator implements ConceptInterface
{
    public function get_All()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
