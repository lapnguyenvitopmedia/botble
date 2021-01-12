<?php

namespace Botble\Concept\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface ConceptInterface extends RepositoryInterface
{
    public function get_all();
}
