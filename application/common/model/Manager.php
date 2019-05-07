<?php


namespace app\common\model;


use think\Model;

class Manager extends Model
{
    public function add($data)
    {
//        $data["status"] = 0;
        $data["password"] = md5($data["password"]);
        return $this->allowField(true)->save($data);
//        return $this->id;
    }
}
