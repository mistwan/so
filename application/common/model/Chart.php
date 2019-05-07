<?php


namespace app\common\model;


use think\Model;

class Chart extends Model
{
    public function getSexAttr($value)
    {
        $sex = [0=>"男", 1=>"女"];
        return $sex[$value];
    }

    public function getRateAttr($value)
    {
        $rate = [0=>"每天", 1=>"每周", 2=>"偶尔", 3=>"感兴趣", 4=>"不玩"];
        return $rate[$value];
    }

    public function getStatusAttr($value)
    {
        $status = [0=>"小学", 1=>"初中", 2=>"高中", 3=>"大学", 4=>"上班"];
        return $status[$value];
    }

    /*public function getModeAttr($value)
    {
        $mode = [0=>"海报", 1=>"视频", 2=>"朋友", 3=>"图文", 4=>"其他"];
        return $mode[$value];
    }

    public function getTypeAttr($value)
    {
        $type = [0=>"咨询", 1=>"评测攻略", 2=>"吐槽", 3=>"美女主播", 4=>"其他"];
        return $type[$value];
    }*/
}
