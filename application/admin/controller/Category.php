<?php


namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\exception\PDOException;

class Category extends Base
{
    protected $cat_model;
    protected $validate;

    public function initialize()
    {
        $this->cat_model = model("Category");
        $this->validate = validate('Category');

        $this->isLogin();
    }

    public function index()
    {
        $indentCat = $this->cat_model->getTree($this->cat_model->getNormalCat());
        $adminCat = $this->cat_model->getAdminCat();
        return $this->fetch('',[
            "adminCat" => $adminCat,
            'indentCat' => $indentCat,
        ]);
    }

    public function save()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }
        $data = input('post.');
//        dump($data);die();
        if (!$this->validate->scene('add')->check($data)) {
            return $this->error($this->validate->getError());
        }
        $addCat = $this->cat_model->add($data);
        if ($addCat) {
            return $this->success("分类增加成功！");
        } else {
            return $this->error("分类增加失败！");
        }
    }

    public function edit($id)
    {
        if (intval($id) < 1) {
            return $this->error("参数不合法！");
        }
        $getCat = $this->cat_model->getNormalCat($id)[0];
        $getTree = $this->cat_model->getTree($this->cat_model->getNormalCat());

        return $this->fetch('', [
            'getCat' => $getCat,
            'getTree' => $getTree
        ]);
    }

    public function update()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }
        $data = input('post.');
        if (!$this->validate->scene('add')->check($data)) {
            return $this->error($this->validate->getError());
        }
        $saveRes = $this->cat_model->save($data, ['cat_id' => $data['cat_id']]);
        if ($saveRes) {
            return $this->success("分类更新成功！", "category/index");
        } else {
            return $this->error("分类更新失败！");
        }
    }

    public function detail($id)
    {
        if (intval($id) < 1) {
            return $this->error("参数不合法！");
        }
        $getCat = $this->cat_model->getNormalCat($id)[0];

        $getParentCat = $this->cat_model->getParentCat($id);

//        dump($getParentCat);die();
        return $this->fetch('', [
            'getCat' => $getCat,
            'getParentCat' => $getParentCat
        ]);
    }

    public function status()
    {
        $data = input('get.');
        if (!$this->validate->scene('status')->check($data)) {
            return $this->error($this->validate->getError());
        }
        $status = $data["status"];
        $cat_id = $data["cat_id"];
        if ($status == -1)
        {
            $isLeaf = $this->cat_model->where('parent_id', $cat_id)->find();
            if ($isLeaf) {
                return $this->error("你下面有小弟，不能狗带！");
            }
            $data["delete_time"] = time();
            $statusRes = $this->cat_model->allowField(true)->save($data,
                ['cat_id' => $cat_id]
            );
        } else {
            $statusRes = $this->cat_model->allowField(true)->save($data,
                ['cat_id' => $cat_id]
            );
        }
//        halt($this->cat_model->getLastsql());
        if ($statusRes) {
            return $this->success("状态更新成功！");
        } else {
            return $this->error('状态更新失败！');
        }
    }

    public function delSelect()
    {
        $data = input('get.');
        $flag = true;
        foreach ($data as $key) {
            if (intval($key) < 1) {
                return $this->error("参数不合法！");
            }
            $result = Db::name('category')
                ->where('cat_id', $key)
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
}
