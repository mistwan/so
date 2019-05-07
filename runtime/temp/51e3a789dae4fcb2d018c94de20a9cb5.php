<?php /*a:1:{s:58:"C:\xampp\htdocs\so\application\index\view\chart\chart.html";i:1544630304;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>chart</title>
    <style media="screen">
        .container {
            width: 800px;
            padding: 10px 50px;
            margin: 20px auto;
            -webkit-box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            -ms-box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
            font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "微软雅黑", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .box > .bar, .box > .pie {
            float: left;
            height: 300px;
            width: 50%;
        }

        .box:after {
            clear: both;
            content: "";
            display: block;
            border: #23abf0 1px solid;
        }

    </style>
    <script src="/static/other/echarts/echarts.js" charset="utf-8"></script>
</head>
<body>

<div class="container">
    <h3><a href="<?php echo url('index/index'); ?>" style="margin-left:85%;color: #3bb4f2;text-decoration: none;">回到首页</a></h3>
    <div class="box">
        <h3>性别统计</h3>
        <div class="bar"></div>
        <div class="pie"></div>
    </div>

    <div class="box">
        <h3>打游戏频率统计</h3>
        <div class="bar"></div>
        <div class="pie"></div>
    </div>

    <div class="box">
        <h3>玩家身份统计</h3>
        <div class="bar"></div>
        <div class="pie" id="statusPie"></div>
    </div>


    <div class="box">
        <h3>游戏感兴趣方式统计</h3>
        <div class="bar"></div>
        <div class="pie"></div>
    </div>

    <div class="box">
        <h3>手游视频感兴趣统计</h3>
        <div class="bar"></div>
        <div class="pie"></div>
    </div>


</div>

<script>

    // sex
    let arr = new Array()
    '<?php if(is_array($sex) || $sex instanceof \think\Collection || $sex instanceof \think\Paginator): $i = 0; $__LIST__ = $sex;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'
    arr.push('<?php echo htmlentities($vo['sex_count']); ?>')
    '<?php endforeach; endif; else: echo "" ;endif; ?>'

    echarts.init(document.getElementsByClassName("bar")[0]).setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ["男", "女"]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            type: 'bar',
            barGap: 100,
            data: [arr[0], arr[1]],

        }]
    }, true);

    echarts.init(document.getElementsByClassName("pie")[0]).setOption({
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series: [{
            name: '性别',
            type: 'pie',
            data: [
                {value: arr[0], name: '男'},
                {value: arr[1], name: '女'}],
        }]
    }, true);

    // rate
    arr = []
    '<?php if(is_array($rate) || $rate instanceof \think\Collection || $rate instanceof \think\Paginator): $i = 0; $__LIST__ = $rate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'
    arr.push('<?php echo htmlentities($vo['rate_count']); ?>')
    '<?php endforeach; endif; else: echo "" ;endif; ?>'

    echarts.init(document.getElementsByClassName("bar")[1]).setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ["每天", "每周", "偶尔", "感兴趣", "不玩"]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            type: 'bar',
            data: [arr[0], arr[1], arr[2], arr[3], arr[4]],

        }]
    }, true);

    echarts.init(document.getElementsByClassName("pie")[1]).setOption({
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series: [{
            name: '游戏频率',
            type: 'pie',
            data: [
                {value: arr[0], name: "每天"},
                {value: arr[1], name: "每周"},
                {value: arr[2], name: "偶尔"},
                {value: arr[3], name: "感兴趣"},
                {value: arr[4], name: "不玩"},
                ],
        }]
    }, true);

    // status
    arr = []
    '<?php if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'
    arr.push('<?php echo htmlentities($vo['status_count']); ?>')
    '<?php endforeach; endif; else: echo "" ;endif; ?>'

    echarts.init(document.getElementsByClassName("bar")[2]).setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ["小学", "初中", "高中", "大学", "上班"]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            type: 'bar',
            data: [arr[0], arr[1], arr[2], arr[3], arr[4]],

        }]
    }, true);

    echarts.init(document.getElementsByClassName("pie")[2]).setOption({
        tooltip : {
            trigger: 'item',
            distance: 20,
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series: [{
            name: '个人情况',
            type: 'pie',
            data: [
                {value: arr[0], name: "小学",},
                {value: arr[1], name: "初中",},
                {value: arr[2], name: "高中",},
                {value: arr[3], name: "大学",},
                {value: arr[4], name: "上班"},
            ],
        }]
    }, true);


    // mode
    echarts.init(document.getElementsByClassName("bar")[3]).setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ["海报", "视频", "朋友", "图文", "其他"]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            type: 'bar',
            data: ['<?php echo htmlentities($mode[0]); ?>', '<?php echo htmlentities($mode[1]); ?>', '<?php echo htmlentities($mode[2]); ?>', '<?php echo htmlentities($mode[3]); ?>', '<?php echo htmlentities($mode[4]); ?>'],

        }]
    }, true);

    echarts.init(document.getElementsByClassName("pie")[3]).setOption({
        tooltip : {
            trigger: 'item',
            distance: 20,
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series: [{
            name: '游戏感兴趣方式',
            type: 'pie',
            data: [
                {value: '<?php echo htmlentities($mode[0]); ?>', name: "海报", },
                {value: '<?php echo htmlentities($mode[1]); ?>', name: "视频", },
                {value: '<?php echo htmlentities($mode[2]); ?>', name: "朋友", },
                {value: '<?php echo htmlentities($mode[3]); ?>', name: "图文", },
                {value: '<?php echo htmlentities($mode[4]); ?>', name: "其他"},
            ],
        }]
    }, true);


    // type
    echarts.init(document.getElementsByClassName("bar")[4]).setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        xAxis: {
            type: 'category',
            data: ["咨询", "评测攻略", "吐槽", "美女主播", "其他"]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            type: 'bar',
            data: ['<?php echo htmlentities($type[0]); ?>', '<?php echo htmlentities($type[1]); ?>', '<?php echo htmlentities($type[2]); ?>', '<?php echo htmlentities($type[3]); ?>', '<?php echo htmlentities($type[4]); ?>'],

        }]
    }, true);

    echarts.init(document.getElementsByClassName("pie")[4]).setOption({
        tooltip : {
            trigger: 'item',
            distance: 20,
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series: [{
            name: '手游视频感兴趣',
            type: 'pie',
            data: [
                {value: '<?php echo htmlentities($type[0]); ?>', name: "咨询",},
                {value: '<?php echo htmlentities($type[1]); ?>', name: "评测攻略", },
                {value: '<?php echo htmlentities($type[2]); ?>', name: "吐槽", },
                {value: '<?php echo htmlentities($type[3]); ?>', name: "美女主播", },
                {value: '<?php echo htmlentities($type[4]); ?>', name: "其他"},
            ],
        }]
    }, true);
</script>


</body>
</html>
