<?php

namespace Botble\Revslider\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Revslider\Repositories\Interfaces\RevsliderInterface;

class RevsliderRepository extends RepositoriesAbstract implements RevsliderInterface
{
    public function getSliders(){
        return $this->model->where('type','=','')->get();
    }
}
