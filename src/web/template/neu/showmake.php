<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>东北大学测温验证平台</title>
    <link href="http://e-report.neu.edu.cn/css/visitor.css?id=e292e3fdbf052c4098f0" rel="stylesheet">
	
    <style>
        @-webkit-keyframes pulse {
            50% {
                -webkit-transform: scale3d(1.2, 1.2, 1.2);
                transform: scale3d(1.2, 1.2, 1.2);
            }
        }
        @keyframes  pulse {
            50% {
                -webkit-transform: scale3d(1.2, 1.2, 1.2);
                transform: scale3d(1.2, 1.2, 1.2);
            }
        }
        .list-group {
            padding: 1em;
        }
        .list-group-item {
            font-size: 1.4em;
            padding: 0.1em;
            border: 0px;
        }
    </style>
</head>
<body>

<div id="app">
    <div class="card border-0 text-center" style="color: #006633">
        <div class="card-body">
            <h2 class="card-title p-2">东北大学通行验证</h2>

            <div class="animated infinite pulse p-2">
                <i class="fas fa-arrow-circle-up" style="font-size: 14em;"></i>
            </div>

            <p class="card-text p-2" style="font-size: 1.3em;">
                时间：<?php echo $time;?>
            </p>
        </div>
    </div>

    <ul class="list-group list-group-flush" style="background-color: #006633">
        <li class="list-group-item bg-transparent text-white d-flex">
            <div style="min-width: 4em; text-align-last: justify;">学工号</div>：<div><?php echo $user_id;?></div>
        </li>
        <li class="list-group-item bg-transparent text-white d-flex">
            <div style="min-width: 4em; text-align-last: justify;">姓名</div>：<div><?php echo $name;?></div>
        </li>
        <li class="list-group-item bg-transparent text-white d-flex">
            <div style="min-width: 4em; text-align-last: justify;">验证位置</div>：<div><?php echo $weizhi;?></div>
        </li>
        <li class="list-group-item bg-transparent text-white d-flex">
            <div style="min-width: 4em; text-align-last: justify;">进出状态</div>：<div><?php echo $status;?></div>
        </li>
            </ul>
</div>
</body>
</html>
