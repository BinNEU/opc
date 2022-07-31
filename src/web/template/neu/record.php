<?php
$cur_path = "template/$OJ_TEMPLATE/";
$url=basename($_SERVER['REQUEST_URI']);
$dir=basename(getcwd());
if($dir=="discuss3") $path_fix="../";
else $path_fix="";
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yansheng">
  <meta http-equiv="Cache-Control" content="o-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483758872##fd2cac389b2b7c009a744bcaecaa41d71592cfe8">
	
		
        <title>健康上报</title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo $cur_path?>static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">
</head> 
<body style="text-align:center;">
<div class="container">
	<div class="row clearfix">
	<br>
			<div class="col-md-12 column">
			<div class="btn-group btn-group-vertical">
				 <a href="test.php"><button class="btn btn-primary" type="button" style="width: 157px; height: 50px;"><em class="glyphicon glyphicon-align-left"></em> 返回主页</button></a> 
				 <a href="https://e-report.neu.edu.cn/inspection/items"><button class="btn btn-primary" type="button" style="width: 157px; height: 50px;"><em class="glyphicon glyphicon-align-left"></em> 上报状态</button></a> 
			</div>
		</div>
		<div class="col-md-4 column">
			<h2>
				晨检
			</h2>
<iframe width="100%" height="400" src="https://e-report.neu.edu.cn/inspection/items/1/records/create">
  <p>您的浏览器不支持  iframe 标签。</p>
</iframe>
		</div>
				<div class="col-md-4 column">
			<h2>
				午检
			</h2>
<iframe width="100%" height="400" src="https://e-report.neu.edu.cn/inspection/items/1/records/create">
  <p>您的浏览器不支持  iframe 标签。</p>
</iframe>
		</div>
				<div class="col-md-4 column">
			<h2>
				晚检
			</h2>
<iframe width="100%" height="400" src="https://e-report.neu.edu.cn/inspection/items/1/records/create">
  <p>您的浏览器不支持  iframe 标签。</p>
</iframe>
		</div>
	</div>
</div>
</body>
</html>