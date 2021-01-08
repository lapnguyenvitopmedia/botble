<?php

namespace Botble\Banners\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface BannersInterface extends RepositoryInterface
{
    public function getAllSlider();
}
