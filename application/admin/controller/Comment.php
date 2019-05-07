<?php


namespace app\admin\controller;


class Comment extends Base
{
    protected $comment;
    protected $validate;

    public function initialize()
    {
        $this->isLogin();
        $this->comment = model("Comment");
        $this->validate = validate("Comment");
    }

    public function index()
    {
        $adminComment = $this->comment->getAdminComment();
        return $this->fetch("",[
            "adminComment" => $adminComment
        ]);
    }

    public function status()
    {
        if (!Request()->isGet()) {
            return $this->error("请求不合法！");
        }
        $data = input("get.");
//        halt($data);
        if (!$this->validate->scene('status')->check($data)) {
            return $this->error($this->validate()->getError());
        }
        if ($data["status"] == -1) {
            $data["delete_time"] = time();
            $statusChange = $this->comment->save($data, ["id" => $data["id"]]);
        } else {
            $statusChange = $this->comment
                ->save($data, ["id" => $data["id"]]);
        }
//        halt($this->art_model->getLastSql());

        if ($statusChange) {
            return $this->success("状态更新成功！");
        } else {
            return $this->error("状态更新失败！");
        }
    }
}
