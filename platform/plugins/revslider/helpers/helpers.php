<?php

use Botble\Revslider\Repositories\Interfaces\RevsliderInterface;

if (!function_exists('get_sliders')) {
    function get_sliders()
    {
        return app(RevsliderInterface::class)->getSliders();
    }
}
