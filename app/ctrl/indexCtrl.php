<?php
namespace app\ctrl;
use core\lib\model;

class indexCtrl extends \core\bigpang
{
    public function index()
    {

        $model=new \app\model\cModel();
        $data=$model->getOne(5);
        dump($data);
    }
}