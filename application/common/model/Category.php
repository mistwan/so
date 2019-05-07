<?php


namespace app\common\model;


use think\Model;

class Category extends Model
{

    public function getAdminCat()
    {
        $where = array(
            ['status', '>', -1]
        );
        $order = array(
            'cat_id' => "desc"
        );
        return $this->where($where)->order($order)->paginate(10, false, ['query' => request()->get()]);
    }

    public function add($data)
    {
        $data['topic_count'] = mt_rand(1, 9);
        $data['article_count'] = mt_rand(5, 50);
        $data['status'] = 1;
        return $this->save($data);
    }

    public function getNormalCat($id = null)
    {
        if ($id) {
            return $this->where([
                ['status', '>', -1],
                ['cat_id', '=', $id],
            ])->select();
        }
        return $this->where('status', 1)->select();
    }

    public function getParentCat($id)
    {

        $getCatId = $this->where("cat_id", $id)->select();
        if ($getCatId[0]["parent_id"] == 0) {
            return "一级分类";
        }
        $pid = $getCatId[0]["parent_id"];
        return $this->where("cat_id", $pid)->select()[0]["cat_name"];
    }

    public function getIndexCat()
    {
        $where = array(
            ['status','=', 1]
        );
//        $where = array('status' ,'>', -1)[->$where = array('id' ,'>', -1)];
        $order = array(
            'cat_id' => "asc"
        );
        return $this->where($where)->limit(4)->order($order)->select();
    }

    public function getTree($list, $parent_id = 0, $level = 0)
    {
        static $arr = array();
        // foreach ($list as $key => $val) {
        //     if ($val["parent_id"] == $parent_id) {
        //         $val["level"] = $level;
        //         $val["cat_name"] = str_repeat("&nbsp;&nbsp;", $level).$val["cat_name"];
        //         $arr[] = $val;
        //         $this->getTree($list, $val['cat_id'], $level + 1);
        //     }
        // }
        foreach ($list as $key => $val) {
            if ($val["parent_id"] == $parent_id) {
                $arr[] = $val;
                $this->getTree($list, $val['cat_id']);
            }
        }
        return $arr;
    }

    public function catArticle()
    {
        return $this->hasMany("Article", "cat_id", "cat_id");
    }
}
