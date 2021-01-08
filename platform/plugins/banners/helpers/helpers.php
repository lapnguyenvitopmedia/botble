<?php

use Botble\Banners\Repositories\Interfaces\BannersInterface;

if (!function_exists('get_slider')) {
    /**
     * @param int $limit
     * @param array $with
     * @return array
     */
    function get_slider()
    {
        return app(BannersInterface::class)->getAllSlider();
    }
}
