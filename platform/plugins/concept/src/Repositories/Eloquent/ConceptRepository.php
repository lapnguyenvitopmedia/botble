<?php

namespace Botble\Concept\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Concept\Repositories\Interfaces\ConceptInterface;

class ConceptRepository extends RepositoriesAbstract implements ConceptInterface
{
    public function get_all()
    {
        $data=$this->model->where('is_featured','=',1)->get();
        return $data;
    }
}
