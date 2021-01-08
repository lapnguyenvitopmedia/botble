<?php

namespace Botble\Banners\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Banners\Repositories\Interfaces\BannersInterface;

class BannersRepository extends RepositoriesAbstract implements BannersInterface
{
    public function getAllSlider()
    {
        // $data=DB::table('revslider_sliders')->where('type','=',null)->get();
        $data=$this->model->where('type','=','')->get();
        return $data;
    }
}
