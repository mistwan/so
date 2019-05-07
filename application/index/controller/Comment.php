<?php


namespace app\index\controller;

use think\Controller;

class Comment extends Controller
{
    protected $comment;

    protected function initialize()
    {
        $this->comment = model("Comment");
    }

    public function add()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }

        $data = input("post.");
        $data["status"] = 0;
        $validate = validate("Comment");
        if (!$validate->scene("add")->check($data)) {
            return $this->error($validate->getError());
        }

        $addComment = model("Comment")->allowField(true)->save($data);
        if ($addComment) {
            return $this->success("评论成功，待审核！");
        } else {
            return $this->error("评论失败，请重试！");
        }

    }
}
