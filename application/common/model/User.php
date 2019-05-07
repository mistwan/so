<?php


namespace app\common\model;


use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;
    public function articles()
    {
        return $this->belongsToMany("Article", "article_user", "article_id", "user_id");
    }
}
