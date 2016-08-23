<?php
namespace app\model;

use core\lib\model;

class cModel extends model
{
    public $table='c';

    public function lists()
    {
        $ret = $this->select($this->table,'*');
        return $ret;
    }
    public function getOne($id)
    {
        $ret = $this->get($this->table,'*',['id'=>$id]);
        return $ret;
    }
}