<?php


namespace app\api\controller;


use app\common\model\User;
use think\Controller;

class Article extends Controller
{
    protected $article;

    protected function initialize()
    {
        $this->article = model("Article");
    }

//    http://so.cc/api/article
    public function index()
    {
        db("article_user")->where([
            "article_id" => "19",
            "user_id" => "1"])->find();
    }

    public function attitude()
    {
        $agree = input("post.count", "0", "intval");
        $article_id = input("post.article_id", "0", "intval");
        $code = input("get.code", "0", "intval");

        $ip = $_SERVER["REMOTE_ADDR"];

        $getUserByIp = User::getByIp($ip);
        $findArticle = $this->article->where("article_id", $article_id)->find();

        if (!$getUserByIp) {
            $user = User::create(["ip" => $ip]);
            $getUserByIp = User::getByIp($ip);
        }

        $findPivot = db("article_user")->where([
            "article_id" => $article_id,
            "user_id" => $getUserByIp->id])->find();

        if ($findPivot) {
            return showAttitude(0, "客官，下篇文章见哦！");
        } else {
            $addPivot = $getUserByIp->articles()->attach($article_id, [
                "create_time" => time(),
                "update_time" => time(),
                "code" => $code
            ]);
            $addAgree = $this->article->save(
                ["agree" => $findArticle["agree"] + 1],
                ["article_id" => $article_id]);
            if ($addAgree && $addPivot) {
                return showAttitude(1, "客官，真是相见恨晚啊！", [
                    "agree" => $findArticle["agree"] + 1
                ]);
            } else {
                return showAttitude(0, "客官，请重试！");
            }
        }
        /*if ($getUserByIp) {
            if(db("article_user")->where([
                "article_id" => $article_id,
                "user_id" => $getUserByIp->id
            ])->find()) {
                return showAttitude(0, "客官，下篇文章见哦！");
            } else {
                $addPivot =  $getUserByIp->articles()->save($article_id);
                $addAgree = $this->article->save(
                    ["agree" => $findArticle["agree"] + 1],
                    ["article_id" => $article_id]);
                if ($addAgree && $addPivot) {
                    return showAttitude(1, "客官，真是相见恨晚啊！", [
                        "agree" => $findArticle["agree"] + 1
                    ]);
                } else {
                    return showAttitude(0, "客官，请重试！");
                }
            }
        } else {
            model("User")->save(["ip" => $ip]);

            $addAgree = $this->article->save(
                ["agree" => $findArticle["agree"] + 1],
                ["article_id" => $article_id]);

            $addPivot =  $getUserByIp->articles()->save($article_id);
            if ($addAgree) {


                return showAttitude(1, "客官，真是相见恨晚啊！", [
                    "agree" => $findArticle["agree"] + 1
                ]);
            } else {
                return showAttitude(0, "客官，请重试！");
            }
        }*/
    }
}

