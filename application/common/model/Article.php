<?php


namespace app\common\model;


use think\Model;

class Article extends Model
{

    protected $pk = "article_id";

    public function users()
    {
        return $this->belongsToMany("User", "article_user", "user_id", "article_id");
    }

    public function getAdminArt()
    {
        $where = array(
            ['status', '>', -1]
        );
//        $where = array('status' ,'>', -1)[->$where = array('id' ,'>', -1)];
        $order = array(
            'update_time' => "desc"
        );
        return $this->where($where)->order($order)->paginate(10, false, ['query' => request()->get()]);
    }

    public function add($data)
    {
        $data['discuss'] = 0;
        $data["scan"] = rand(100, 999);
        $data["agree"] = rand(100, 999);
        $data["disagree"] = rand(0, 9);
        $data['status'] = 1;
        return $this->save($data);
    }

    public function getNormalArt($id = null, $flag = false)
    {
        if ($flag == true) {
            return $this->where([
                ["article_id", "=", $id],
                ["status", ">", -1]
            ])->find();
        }
        return $this->where([
            ["status", ">", -1],
            ["article_id", "=", $id]
        ])->select();
    }

    public function getIndexArt($id = null)
    {
        $where = array(
            ['status', '=', 1]
        );
//        $where = array('status' ,'>', -1)[->$where = array('id' ,'>', -1)];
        $order = array(
            'update_time' => "desc"
        );
        if ($id) {
            $where = array([
                ['status', '=', 1],
                ["cat_id", "=", $id]
            ]);
        }
        return $this->where($where)->order($order)
            ->paginate(10, false, ['query' => request()->get()]);

    }

    public function search($arr)
    {
        $where = array([
            ["article_title", "like", $arr],
            ["status", "=", 1]
        ]);

        $order = array(
            'update_time' => "desc"
        );

        $is_null = $this->where($where)->order($order)->find();
        if (!$is_null) {
            return false;
        }
        return $this->where($where)->order($order)
               ->paginate(10, false, ['query' => request()->get()]);

    }
}
