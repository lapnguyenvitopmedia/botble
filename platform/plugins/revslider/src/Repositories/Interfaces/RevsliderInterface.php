<?php

namespace Botble\Revslider\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface RevsliderInterface extends RepositoryInterface
{
    public function getSliders();
}
