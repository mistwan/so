<?php


namespace app\common\model;


use think\Model;

class Comment extends Model
{
    public function getAdminComment()
    {
        $order = array(
            "create_time" => "desc"
        );
        return $this->order($order)->paginate(10);
    }

    public function getIndexComment($article_id)
    {
        $where = array([
            ["status","=", 1],
            ["article_id", "=", $article_id]
        ]);
        $order = array(
            "create_time" => "desc"
        );
        return $this->where($where)->order($order)->select();
    }
}
