<?php


namespace app\admin\controller;


//use function PHPSTORM_META\elementType;
use think\Controller;
use think\Db;


class Article extends Base
{
    protected $art_model;
    protected $cat_model;
    protected $validate;

    public function initialize()
    {
        $this->art_model = model("Article");
        $this->cat_model = model("Category");
        $this->validate = validate("Article");

        $this->isLogin();
    }

    public function index()
    {
        $getAdminArt = $this->art_model->getAdminArt();
        return $this->fetch('', [
            'adminArt' => $getAdminArt
        ]);
    }

    public function add()
    {
        $indentCat = $this->cat_model->getTree($this->cat_model->getNormalCat());
        return $this->fetch('', [
            'indentCat' => $indentCat
        ]);
    }

    public function save()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }

        $data = input('post.');
        $data["article_logo"] = $this->image("article_logo");
        if (!$this->validate->scene("add")->check($data)) {
            return $this->error($this->validate->getError());
        }

        $addArt = $this->art_model->add([
            'article_logo' => $data["article_logo"],
            "article_title" => $data['article_title'] ? $data['article_title'] : 0,
            "article_desc" => $data["article_desc"],
            "article_content" => $data["article_content"],
            "cat_id" => $data["cat_id"]
        ]);
        if ($addArt) {
            return $this->success("文章添加成功！", "article/index");
        } else {
            return $this->error("文章添加失败");
        }
    }

    public function edit($id)
    {
        if (intval($id) < 1) {
            return $this->error("参数不合法！");
        }
        $getArt = $this->art_model->getNormalArt($id)[0];
        $getTree = $this->cat_model->getTree($this->cat_model->getNormalCat());

        return $this->fetch('', [
            'getArt' => $getArt,
            'getTree' => $getTree,
            'id' => $id
        ]);
    }

    public function update()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }

        $data = input("post.");
        try {
            $data["article_logo"] = $this->image("article_logo");
        } catch (\Exception $e) {
            $data["article_logo"] = $this->art_model->where("article_id", $data["article_id"])->value("article_logo");
        }

//        halt($data);

        if (!$this->validate->scene('update')->check($data)) {
            return $this->error($this->validate->getError());
        }
        $updateArt = $this->art_model->save($data, ['article_id' => $data['article_id']]);
        if ($updateArt) {
            return $this->success("分类更新成功！", "article/index");
        } else {
            return $this->error("分类更新失败！");
        }
    }

    public function status()
    {
        if (!Request()->isGet()) {
            return $this->error("请求不合法！");
        }
        $data = input("get.");
        if (!$this->validate->scene('status')->check($data)) {
            return $this->error($this->validate()->getError());
        }
        if ($data["status"] == -1) {
            $data["delete_time"] = time();
            $statusArt = $this->art_model->save($data, ["article_id" => $data["article_id"]]);
        } else {
            $statusArt = $this->art_model
                ->save($data, ["article_id" => $data["article_id"]]);
        }
//        halt($this->art_model->getLastSql());

        if ($statusArt) {
            return $this->success("状态更新成功！");
        } else {
            return $this->error("状态更新失败！");
        }
    }

    public function detail()
    {
        $article_id = input("get.article_id");
        if (intval($article_id) < 1) {
            return $this->error("参数不合法！");
        }
        $detailArt = $this->art_model->getNormalArt($article_id, true);
        return $this->fetch('',[
            "detailArt" => $detailArt
        ]);
    }
    public function delSelect()
    {
        $data = input('get.');
//        halt($data);
        $flag = true;
        foreach ($data as $key) {
            if (intval($key) < 1) {
                return $this->error("参数不合法！");
            }
            $result = Db::name('article')
                ->where('article_id', $key)
                ->update([
                    'status' => -1,
                    'delete_time' => time()
                ]);
            if ($result == false) {
                $flag = false;
                return $flag;
            }
        }
        if ($flag) {
            return $this->success("删除更新成功！");
        } else {
            return $this->error('删除更新失败！');
        }
    }
    protected function image($img)
    {
        $image = request()->file($img);
        $info = $image->validate(['size' => 2097152, 'ext' => 'jpg,png,gif'])->move("uploads");
        if (!$info) {
            return $info->getError();
        }
        return '\\' . $info->getPathName();
    }
}
