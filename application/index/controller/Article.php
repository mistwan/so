<?php


namespace app\index\controller;


use think\Controller;
use think\Db;

class Article extends Controller
{
    public function index()
    {
        if (!request()->isGet()) {
            return $this->error("请求方法错误");
        }
        $id = input("get.id");
        if (intval($id) < 0) {
            return $this->error("请求方法错误！");
        }

        $detailArt = model("Article")->where([
            ["status", "=", 1],
            ["article_id", "=", $id]
        ])->find();


        $addScan = model("Article")->save([
            "scan" => $detailArt["scan"] + 1,
            "true_scan" => $detailArt["true_scan"] + 1
        ], ["article_id" => $id]);


        $cat = db("category")->alias("c")
            ->join('article a', "c.cat_id=a.cat_id")
            ->where(["c.status" => 1, "a.status" => 1])
            ->group("c.cat_id")
            ->field("c.cat_name,c.cat_id,c.parent_id,count(c.cat_id) as cat_count")
            ->select();

        $getArticleById = \app\common\model\Article::get($id);

        return $this->fetch('',[
            "detailArt" => $detailArt,
            "cat" => $cat,
        ]);
    }

    public function items()
    {
        if (!request()->isGet()) {
            return $this->error("请求方法错误");
        }
        $artList = model("Article")->getIndexArt(input("get.id"));
        return $this->fetch('',[
            'artList' => $artList
        ]);
    }

    public function search()
    {
        if (!request()->isGet()) {
            return $this->error("请求方法错误");
        }

        $name = input("get.search");

        if (!$name) {
            return $this->error("请输入正确的内容！");
        }

        $ex = explode(" ", $name);
        $arr = array();
        foreach ($ex as $key) {
            $key = "%" . $key. "%";
            array_push($arr, $key);
        }

        $search = model("Article")->search($arr);

        if ($search) {
            return $this->fetch('',[
                'search' => $search
            ]);
        } else {
            return $this->error("客官，页面跑到火星上去了，__>");
        }
    }
}
