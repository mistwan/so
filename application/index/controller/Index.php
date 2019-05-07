<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $indexCat = model("Category")->getIndexCat();
        $indexArt = model("Article")->getIndexArt();
        return $this->fetch('', [
            'indexCat' => $indexCat,
            'indexArt' => $indexArt
        ]);
    }
}
