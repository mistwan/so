<?php


namespace app\index\controller;


use think\Controller;

class Chart extends Controller
{
    protected $chart;

    protected function initialize()
    {
        $this->chart = model("Chart");
    }

    public function index()
    {
        return $this->fetch();
    }

    // http://so.cc/index/chart/index
    public function add()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法错误！");
        }
        $data = input('post.');
        $data = $data["data"];
        $validate = validate("Chart");
        if (!$validate->scene("add")->check($data)) {
            return $this->error($validate->getError());
        }
        $mode = implode("|", $data['mode']);
        $type = implode("|", $data['type']);
        $addChart = $this->chart->allowField(true)->save([
            "sex" => $data["sex"],
            "rate" => $data["rate"],
            "status" => $data["status"],
            "mode" => $mode,
            "type" => $type,
            "what" => $data["what"]
        ]);
        if ($addChart) {
            return "1";
        } else {
            return "0";
        }
    }

    // http://so.cc/index/chart/chart
    public function chart()
    {
        /*dump($this->countSingle("sex"));
        dump($this->countSingle("status"));
        halt($this->countCheck("type"));*/
        return $this->fetch("", [
            "sex" => $this->countSingle("sex"),
            "rate" => $this->countSingle("rate"),
            "status" => $this->countSingle("status"),
            "mode" => $this->countCheck("mode"),
            "type" => $this->countCheck("type"),
        ]);
    }

    public function countSingle($field)
    {
        return $this->chart->field("$field,count($field) as $field" . "_count,(select count(*) from so_chart) as count")->group("$field")->select();
    }

    public function countCheck($field)
    {
        $check = $this->chart->field("$field,count($field) as $field" . "_count")->group("$field")->select();
        $arr = array();
        foreach ($check as $out) {
            $numbers = explode("|", $out[$field]);
            foreach ($numbers as $in) {
                $n = intval($out["$field" . "_count"]);
                if (isset($arr[$in])) {
                    $arr[$in] = $arr[$in] + $n;
                } else {
                    $arr[$in] = $n;
                }
            }
        }
        $arr['count'] = 0;
        foreach ($arr as $key) {
            $arr['count'] += $key;
        }
        return $arr;
    }
}

/*$sex = $this->chart->field("sex,count(sex) as sex_count,(select count(*) from so_chart) as count")->group("sex")->select();
        dump($sex);*/

/*$mode = $this->chart->field("mode,count(mode) as mode_count")->group("mode")->select();
$arr = array();
foreach ($mode as $out) {
    $numbers = explode("|", $out["mode"]);
    foreach ($numbers as $in) {
        $n = intval($out['mode_count']);
        if (isset($arr[$in])) {
            $arr[$in] = $arr[$in] + $n;
        } else {
            $arr[$in] = $n;
        }
    }
}
$arr['count'] = 0;
foreach ($arr as $key) {
    $arr['count'] += $key;
}
halt($arr);*/
