<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Concept\Repositories\Interfaces\ConceptInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Supports\PostFormat;
use Illuminate\Support\Arr;

if (!function_exists('get_data')) {
    /**
     * @param int $limit
     * @param array $with
     * @return array
     */
    function get_data()
    {
        return app(ConceptInterface::class)->get_all();
    }
}
